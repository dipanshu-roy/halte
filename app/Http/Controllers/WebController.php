<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\PageContent;
use App\Models\User;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Product;
use App\Models\Blog;
use Auth;
use DB;
class WebController extends Controller
{   
    public function index(){
        $categories = ProductCategory::select('id','category_name','category_slug')->orderBy('id','DESC')->get();
        return view('home',compact('categories'));
    }
    public function Product(Request $request,$slug){
        $categories = ProductCategory::select('id','category_name','category_slug','banner_image')->orderBy('id','DESC')->get();
        $get_selected_brand = Brand::select('id','barnd_name')->where('barnd_slug',$slug)->first();
        $sub_categories = DB::select("SELECT a.category_slug,b.subcategory_name,b.subcategory_slug,b.banner_image FROM `product_categories` as a INNER JOIN product_sub_categories as b on a.id=b.category_id");
        if(!empty($get_selected_brand)){
            $selected_brand = $get_selected_brand;
        }else{
            $selected_brand = [];
        }
        return view('product_list',compact('selected_brand','categories','sub_categories'));
    }
    public function SubProduct(Request $request,$cat,$subcat){
        $categories = ProductCategory::select('id','category_name','category_slug','banner_image')->orderBy('id','DESC')->get();
        $get_selected_subcategories = ProductSubCategory::select('id','subcategory_name','subcategory_slug','page_title','page_description','page_keywords')->where('subcategory_slug',$subcat)->first();
        $sub_categories = DB::select("SELECT a.category_slug,b.subcategory_name,b.subcategory_slug,b.banner_image FROM `product_categories` as a INNER JOIN product_sub_categories as b on a.id=b.category_id");
        
        if(!empty($get_selected_subcategories)){
            $selected_subcategories = $get_selected_subcategories;
        }else{
            $selected_subcategories = [];
        }
        return view('product_list',compact('categories','selected_subcategories','sub_categories'));
    }
    public function ContactUs(Request $request){
        $page_content = PageContent::select('page','page_name','text','image','map_link','link','page_title','description','keyword')->where('page_name',$request->segment(1))->first();
        return view('contact_us',compact('page_content'));
    }
    public function WebPages(Request $request){
        $page_content = PageContent::select('page','page_name','text','image','map_link','link','page_title','description','keyword')->where('page_name',$request->segment(1))->first();
        return view('web_pages',compact('page_content'));
    }
    public function Blogs(Request $request){
        $blogs = Blog::select('id','title','text','image')->paginate(5);
        return view('blogs',compact('blogs'));
    }
    public function BlogsRead($id){
        $blogs = Blog::select('id','title','text','image')->where('id',$id)->first();
        return view('blogs_read',compact('blogs'));
    }
    public function SendEnquiry(Request $request){
        $this->SendEnquiryMail($request);
        return redirect()->back()->with('success', 'Enquery Sent Successfully');
    }
    /**
     * cart starts
    */
    public function cart(){
        $users = Auth::user();
        if(!empty($users)){

        }else{
            $cart = session()->get('cart');
            $cart_data=[];
            // for($i=0;$i<count($cart);$i++){
                
            // }
            $cart_data=Product::select('id','product_name','product_slug','main_image','mrps','sale_price')->whereIn('id',array_keys($cart))->get();
        }
        return view('cart',compact('cart_data'));
    }
    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "quantity" => 1,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    /**
     * cart Ends
    */
    public function AccountLogin(){
        return view('account_login');
    }
    public function SendEnquiryMail($data){
        $email = array('codestoresolution@gmail.com');
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