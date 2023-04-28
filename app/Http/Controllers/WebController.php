<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\PageContent;
use App\Models\User;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Auth;
class WebController extends Controller
{   
    public function index(){
        $users = Auth::user();
        $get_brand = Brand::select('id','barnd_name','barnd_slug')->orderBy('id','DESC')->get();
        $categories = ProductCategory::select('id','category_name','category_slug')->orderBy('id','DESC')->get();
        return view('home',compact('users','get_brand','categories'));
    }
    public function Product(Request $request,$slug){
        $users = Auth::user();
        $get_brand = Brand::select('id','barnd_name','barnd_slug')->orderBy('id','DESC')->get();
        $categories = ProductCategory::select('id','category_name','category_slug')->orderBy('id','DESC')->get();
        $get_selected_brand = Brand::select('id','barnd_name')->where('barnd_slug',$slug)->first();
        if(!empty($get_selected_brand)){
            $selected_brand = $get_selected_brand;
        }else{
            $selected_brand = [];
        }
        return view('product_list',compact('users','get_brand','selected_brand','categories'));
    }
    public function SubProduct(Request $request,$cat,$subcat){
        $users = Auth::user();
        $get_brand = Brand::select('id','barnd_name','barnd_slug')->orderBy('id','DESC')->get();
        $categories = ProductCategory::select('id','category_name','category_slug')->orderBy('id','DESC')->get();
        $get_selected_subcategories = ProductSubCategory::select('id','subcategory_name','subcategory_slug','banner_image','page_title','page_description','page_keywords')->where('subcategory_slug',$subcat)->first();
        if(!empty($get_selected_subcategories)){
            $selected_subcategories = $get_selected_subcategories;
        }else{
            $selected_subcategories = [];
        }
        return view('product_list',compact('users','get_brand','categories','selected_subcategories'));
    }
    public function ContactUs(){
        $users = Auth::user();
        $page_content = PageContent::select('page_name','text','image','map_link','link','page_title','description','keyword')->where('page_name','contact-us')->first();
        return view('contact_us',compact('users','page_content'));
    }
    public function SendEnquiry(Request $request){
        $this->SendEnquiryMail($request);
        return redirect()->back()->with('success', 'Enquery Sent Successfully');
    }
    public function SendEnquiryMail($data){
        $email = array('codestoresolution@gmail.com', $data->email);
        try {
            $template_data = [
                'email'         => $data->email,
                'name'          => $data->f_name.' '.$data->l_name,
                'mobile'        => $data->mobile,
                'description'   => $data->description,
                'subject'       => 'New enquiry From '.$data->f_name.' '.$data->l_name,
            ];
            Mail::send(['html'=>'email.enquiry'], $template_data,
                function ($message) use ($email,$template_data) {
                    $message->to($email)->from("codestoresolution@gmail.com")->subject($template_data['subject']);
            });
            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
}