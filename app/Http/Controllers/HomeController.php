<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\EmpDetail;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $users = Auth::user();
        if($users->type == 'admin') {
            $user = $this->profile();
            return view('superadmin.home',compact('user'));
        }elseif($users->type == 'staff'){
            $user = $this->profile();
            return view('admin.home',compact('user'));
        }elseif($users->type == 'user'){
            $organisation = Organisation::where(['user_id'=>$users->organisation_id])->first();
            return view('user.home',compact('organisation'));
        }
    }
}
