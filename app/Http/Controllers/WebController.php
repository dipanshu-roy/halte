<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Brand;
use Auth;
class WebController extends Controller
{
    
    public function index(){
        $users = Auth::user();
        $get_brand = Brand::select('id','barnd_name','barnd_slug')->orderBy('id','DESC')->get();
        return view('home',compact('users','get_brand'));
    }
    public function Brand(Request $request,$slug){
        $users = Auth::user();
        $get_brand = Brand::select('id','barnd_name','barnd_slug')->orderBy('id','DESC')->get();
        $selected_brand = Brand::select('id','barnd_name')->where('barnd_slug',$slug)->first();
        return view('product_list',compact('users','get_brand','selected_brand'));
    }
}