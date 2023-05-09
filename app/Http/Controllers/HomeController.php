<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\EmpDetail;
use App\Models\User;
use Auth;
use DB;
class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $users = Auth::user();
        if($users->type == 'admin') {
            $user = $this->profile();
            $reviews = DB::select("SELECT a.id,c.name,c.email,c.mobile,b.product_name,b.main_image,a.rating,a.title,a.description,a.status,a.created_at FROM `reviews` as a INNER JOIN products as b on a.product_id=b.id INNER JOIN users as c on a.user_id=c.id ORDER BY a.id DESC LIMIT 5");
            return view('superadmin.home',compact('user','reviews'));
        }elseif($users->type == 'staff'){
            $user = $this->profile();
            return view('admin.home',compact('user'));
        }elseif($users->type == 'user'){
            return redirect('')->with('success', 'Login successfully');
        }
    }
}
