<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;


use App\Models\Organisation;
use App\Models\City;
use App\Models\EmpAttendance;
use App\Models\Leave;
use App\Models\ProjectActivity;
use App\Models\Timeseet;
use App\Models\EmpDetail;
use App\Models\SourceMaster;
use App\Models\PositionMaster;
use App\Models\NoticeMaster;
use App\Models\EducationMaster;
use App\Models\EmpDocument;
use App\Models\LetterTemplate;
use App\Models\ProjectMaster;
use App\Models\FormEngineCategory;
use App\Models\OfficeMaster;
use App\Models\DepartmentMaster;
use App\Models\ShiftMaster;
use App\Models\LeaveType;
use App\Models\EmpType;
use App\Models\State;
use App\Models\EmployeeInfo;
use App\Models\AssignTask;
use App\Models\FormEngine;
use App\Models\WeekDay;
use Auth;
use DB;

class ApiController extends Controller
{
    public function GetReportingUser($user_id){
        $reporting = DB::select("SELECT a.orgnization_id,a.reporting_id,b.email as report_email,b.name as report_name,c.name as org_name,c.email as org_email FROM `emp_reportings` as a INNER JOIN users as b on a.reporting_id=b.id INNER JOIN users as c on a.orgnization_id=c.id WHERE JSON_CONTAINS(a.employee_id,$user_id)=1");
        if(!empty($reporting[0])){
            return $reporting[0];
        }else{
            return array();
        }
    }
    public function SendAttendanceMail($data){
        $email = array($data->org_email, $data->report_email);
        try {
            $template_data = [
                'report_email'  => $data->report_email,
                'report_name'   => $data->report_name,
                'org_name'      => $data->org_name,
                'org_email'     => $data->org_email,
                'user_name'     => Auth::user()->name
            ];
            Mail::send(['html'=>'email.attendance'], $template_data,
                function ($message) use ($email,$template_data) {
                    $message->to($email)->from("dipanshu.roy68@gmail.com")->subject($template_data['user_name'].' marked attendance on '.date('d-M-Y'));
            });
            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    public function EmployeeLogin(Request $request) {
        $this->ValidIn($request,['email','password','fcm_id']);
        $user = User::select('id','email','status','password')->where('email',$request->email)->first();
        if(!empty($user)){
            if($user->status=='Active'){
                if (Hash::check($request->password, $user->password)){
                    $token = $user->createToken('Login Successfully')->accessToken;
                    $personal_access = DB::table('personal_access_tokens')->select('token')->where('tokenable_id',$user->id)->orderBy('id', 'desc')->first();
                    $usersdata = User::select('id','name','email','mobile','type','fcm_id','status','remember_token','created_at')->where('id',$user->id)->first();
                    $usersdata->remember_token = $personal_access->token;
                    $usersdata->fcm_id =  $request->fcm_id;
                    $usersdata->save();
                    $setuser['id']      =$usersdata->id;
                    $setuser['name']    =$usersdata->name;
                    $setuser['email']   =$usersdata->email;
                    $setuser['mobile']  =$usersdata->mobile;
                    $setuser['type']    =$usersdata->type;
                    $setuser['fcm_id']  =$usersdata->fcm_id;
                    $setuser['status']  =$usersdata->status;
                    $setuser['token']   =$usersdata->remember_token;
                    $setuser['date' ]   =date_format(date_create($usersdata->created_at),"d-M-Y H:i");
                    $response = ["status"=>200,"message" => "Login Successfully","data" => $setuser];
                    return response()->json($response);
                } else {
                    $response = ["status"=>422,"message" => "Password not matched","data"=>null];
                    return response()->json($response);
                }
            }else{
                $response = ["status"=>422,"message" => "Your account is deactive please contact to you admin","data"=>null];
                return response()->json($response);
            }
        } else {
            $response = ["status"=>422,"message" =>"User does not exist","data"=>null];
            return response()->json($response);
        }
    }
    public function MarkAttendance(Request $request){
        $this->ValidIn($request,['token','snapshot','latitude','longitude']);
        $user = User::select('id','name')->where('remember_token',$request->token)->first();
        if(!empty($user)){
            $date = date('Y-m-d');
            $curren_time = date('H:i:s');
            $user_id = $user->id;
            if($request->hasFile('snapshot')){
                $imageName = str_replace(' ', '_', $user->name).'_'.$user_id.'.'.$request->snapshot->extension();
                $request->snapshot->move(public_path('employee/attendance'),$imageName);
            }
            if(empty($request->latitude) && empty($request->longitude)){
                return response()->json(['status'=>400,'message'=>'Please Turn On Your Location']);exit;
            }
            $attendance = DB::select("SELECT id,TIMEDIFF('$curren_time',in_time) as totaltime from `emp_attendances` WHERE DATE(created_at) = '$date' AND user_id=$user_id LIMIT 1");
            if(!empty($attendance[0])){
                $emp_attendance = EmpAttendance::where(['id'=>$attendance[0]->id])->first();
                $emp_attendance->user_id = $user_id;
                $emp_attendance->out_time = $curren_time;
                $emp_attendance->out_image = $imageName;
                $emp_attendance->out_latitude = $request->latitude;
                $emp_attendance->out_longitude = $request->longitude;
                $emp_attendance->total_time = $attendance[0]->totaltime;
                $emp_attendance->save();
                // $reporting = $this->GetReportingUser($user_id);
                // $this->SendAttendanceMail($user,$reporting);
                return response()->json(['status'=>200,'message'=>'Successfully Attancdance Marked Out']);
            }else{
                $emp_attendance = new EmpAttendance();
                $emp_attendance->user_id = $user_id; 
                $emp_attendance->in_time = $curren_time;
                $emp_attendance->in_image = $imageName;
                $emp_attendance->in_latitude = $request->latitude;
                $emp_attendance->in_longitude = $request->longitude;
                $emp_attendance->save();
                // $reporting = $this->GetReportingUser($user_id);
                // $this->SendAttendanceMail($user,$reporting);
                return response()->json(['status'=>200,'message'=>'Successfully Attancdance Marked In']);
            }
        }else{
            $response = ["status"=>422,"message" =>"User not found","data"=>null];
            return response()->json($response);
        }
    }
    public function ValidIn($request,$required_fields){
        foreach ($required_fields as $key => $value) {
            if(empty($request[$value])){
                $dataresponce=['Api_status'=>422,'msg'=> $value.' (POST) is missing'];
                echo json_encode($dataresponce);exit;
            }
        }
    }
}
