<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\Models\ProductSubCategory;
use App\Models\Creadit;
use App\Models\Debit;
use Illuminate\Support\Str;
use Auth;
use DB;
class AjaxController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function GetGubcategory(Request $request){
        $data = ProductSubCategory::select('id','subcategory_name')->where('category_id',$request->category_id)->get();
        if(!empty($data)){
            return response()->json(['status'=>200,'data'=>$data]);
        }else{
            return response()->json(['status'=>400,'data'=>'']);
        }
    }




















    public function UsersStatus(Request $request){
        $user_id = Auth::user()->id;
        $data = User::select('id','status')->where('id',$request->id)->first();
        $data->status = $request->status;
        $data->save();
        if(!empty($data)){
            return response()->json(['status'=>200,'data'=>$data]);
        }else{
            return response()->json(['status'=>400,'data'=>'']);
        }
    }
    public function ImageUpload(Request $request){
        if(!empty($request->file('image'))){
            $data = date('Y').'/'.date('M').'/';
            $extension = $request->image->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            $path = $request->image->move('public/profile/'.$data.'',$fileNameToStore);
            if(!empty($path)) {
                $images = new Image();
                $images->user_id = Auth::user()->id;
                $images->image = $path;
                $images->save();
                $responce['status']=200;
                $responce['msg']='Image Uploaded Successfully';
            }else{
                $responce['status']=400;
                $responce['msg']='Image Not Uploaded';
            }
        }else{
            $responce['status']=400;
            $responce['msg']='Select Image First';
        }
        return response()->json($responce);
	}
    public function LoadImage(){
        $user_id = Auth::user()->id;
        $image_result = Image::where('user_id',$user_id)->select('id','image')->get();
        if(!empty($image_result)){ 
            foreach($image_result as $row){
            echo '<div class="col-md-3 mt-2 mb-2">
                <img src="'.url($row->image).'" class="modal-images" onclick="get_this_image('.$row->id.')" data-dismiss="modal" aria-label="Close"/>
                <input type="checkbox" id="check-data-'.$row->id.'" value="'.$row->id.'" class="form-check-input delete-checkbox filled-in"></div>';
            } ?>
            <script>
                $('.delete-checkbox, .check-all').change(function(event) {
                    var checked = $('.delete-checkbox:checked').length;
                    $('.delete-btn').text('Delete Selectd ('+checked+')');
                    if(checked>0){
                        $('.delete-btn').addClass('delete-selected');
                    }else{
                        $('.delete-btn').removeClass('delete-selected');
                    }
                });
            </script>
            <?php
        }
    }
    public function LoadImageId($id){
        $image_result = Image::select('image')->where('id',$id)->first();
        return url($image_result->image);
    }
    public function DeleteImage(Request $request){
        $count = count($request->id);
        for($i=0;$i<$count;$i++){
            Image::where('id',$request->id[$i])->delete();
        }
        return response()->json(['status'=>200]);
    }
    public function CheckEmail(Request $request){
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['status'=>401,'message'=>'Please enter valide email-id']);exit;
        }
        $slelect = User::where(['email'=>$request->email])->first();
        if(!empty($slelect)){
            return response()->json(['status'=>404,'message'=>'Unavailable !']);
        }else{
            return response()->json(['status'=>200,'message'=>'Available !']);
        }
    }
    public function GetState(Request $request){
        $data = State::select(['id','name'])->where(['country_id'=>$request->country_id])->orderBy('name', 'ASC')->get();
        return response()->json(['data' => $data]);
    }
    public function GetCity(Request $request){
        $data = City::select(['id','name'])->where(['state_id'=>$request->state_id])->orderBy('name', 'ASC')->get();
        return response()->json(['data' => $data]);
    }
    public function NotificationsCount(){
        $users = Auth::user();
        $data = NotificationsHistory::where('user_id',$users->id)->where('is_view',0)->count();
        return response()->json(['status'=>200,'data'=>$data]);
    }
    public function NotificationsHistory(){
        $users = Auth::user();
        $data = NotificationsHistory::select('id','title','description','image','created_at')->where('user_id',$users->id)->where('is_view',0)->orderBy('created_at', 'DESC')->get();
        $datasx = [];
        foreach($data as $row){
            $dt['id'] = $row->id;
            $dt['title'] = $row->title;
            $dt['description'] = $row->description;
            $dt['image'] = $row->image;
            $dt['created_at'] = $this->TimeElapsedString($row->created_at);
            $datasx[] = $dt;
        }
        return response()->json(['status'=>200,'data'=>$datasx]);
    }
    public function ReadNotification(Request $request){
        $notification = NotificationsHistory::select('id','title','description','image')->where('id',$request->id)->first();
        $notification->is_view = 1;
        $notification->save();
        return response()->json(['status'=>200,'data'=>$notification]);
    }
    public function StoreToken(Request $request){
        $user_id = Auth::user()->id;
        $user = User::select()->Where('id',$user_id)->first();
        $user->fcm_id = $request->token;
        $user->save();
        return response()->json(['status'=>200,'msg'=>'Succefully fetach','data'=>$user]);
    }
    public function GetSetting(Request $request){
        $setting = Setting::select('values')->where('id',$request->id)->first();
        return response()->json(['status'=>200,'data'=>$setting->values]);
    }
    public function Wallet(){
        $users = Auth::user();
        $cr = Creadit::where('user_id',$users->id)->sum('amount');
        $db = Debit::where('user_id',$users->id)->sum('amount');
        $total = $cr-$db;
        return response()->json(['status'=>200,'data'=>round($total,2)]);
    }
    public function send(){
        $users = Auth::user();
        $dt = Template::select('content')->where('uid','640d52d9c42ee')->first();
        $data['content'] = $dt->content;
        $data['template'] = 'email.bulk';
        $data['email'] = 'rajdeepsaxena0@gmail.com';
        $data['from'] = 'noreply.dipanshu@gmail.com';
        $data['subject'] = 'This is test';

        
        $this->SendMail($data);
    }
    public function DeleteImportData(Request $request){
        $requestid = $request->id;
        $countid = count($requestid);
        for($i=0; $i<$countid; $i++){
            RecipientEmail::where('id',$requestid[$i])->delete();
        }
        $dataresponce=['status'=>200,'msg'=>'Successfully Deleted'];
        return response()->json($dataresponce);
    }
}
