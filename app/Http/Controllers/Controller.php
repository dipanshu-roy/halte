<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\NotificationsHistory;

use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function profile($user_id=null){
        if(!empty($user_id)){
            return User::where('id',$user_id)->first();
        }else{
            $users = Auth::user();
            return User::where('id',$users->id)->first();
        }
    }
    public function SendMail($data){
        try {
            Mail::send(['html'=>$data['template']], $data,
                function($message) use ($data) {
                    $message->to($data['email'])->from($data['from'])->subject($data['subject']);
            });
            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    public function TimeElapsedString($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'min',
            's' => 'sec',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if(!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    public function SendPushNotifications($noti_data,$users,$user_type=0){
        if(!empty($users->fcm_id)){
            $subscription_key  = 'key=AAAAG7wrjHo:APA91bH4jiRhFeKIJH162DXswTxQj5lqfl3Pv98UcEzE6k4AkjAn-u6P-mEyoWEqiEV6epMeNCiWieIFiO3Fc4fNQLkt7vH_CX8Ki59Gr-uKzCixQdxoKA8vhOvwqTHo-oGTG-Pdf8TL';
            $request_headers = [
                "Authorization:" . $subscription_key,
                "Content-Type: application/json"
            ];
            $postRequest = [
                "notification"=>[
                    "title"         =>$noti_data['title'],
                    "body"          =>$noti_data['body'],
                    "icon"          =>!empty($noti_data['icon']) ? $noti_data['icon']:'',
                    "click_action"  =>!empty($noti_data['click_action']) ? $noti_data['click_action']:'',
                ],
                "to"=>$users->fcm_id
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postRequest));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
            $season_data = curl_exec($ch);
            if (curl_errno($ch)) {
                print "Error: " . curl_error($ch);
            }
            curl_close($ch);
        }
        $data = new NotificationsHistory();
        $data->user_id  = $users->id;
        $data->title  = $noti_data['title'];
        $data->description  = $noti_data['body'];
        $data->msg_status  = @$season_data;
        $data->user_type  = $user_type;
        $data->save();
    }
}
