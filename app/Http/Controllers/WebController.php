<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\PageContent;
use App\Models\User;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductFeature;
use App\Models\ProductFeatureDetail;
use App\Models\ProductSpecifications;
use App\Models\VisionInnovation;
use App\Models\ServiceSpare;
use App\Models\ContactQuery;
use App\Models\DealerQuery;
use App\Models\SuggestionProduct;
use App\Models\Product;
use App\Models\OurBrand;
use App\Models\NewsMedia;
use App\Models\Review;
use App\Models\Checkout;
use App\Models\Home;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\OfferCoupon;
use App\Models\Setting;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Auth;
use DB;
class WebController extends Controller
{   
    public function index(){
        $home = Home::where('id',1)->first();
        $home_brand = OurBrand::orderBy('sr_no','ASC')->get();
        $categories = ProductCategory::select('id','category_name','category_slug')->orderBy('id','DESC')->get();
        $vision_innovation = VisionInnovation::orderBy('sr_no','ASC')->get();
        $service_spare = ServiceSpare::orderBy('sr_no','ASC')->get();
        $suggestion_product = SuggestionProduct::select('id','title','product_id')->orderBy('sr_no','ASC')->get();
        return view('home',compact('categories','home','home_brand','vision_innovation','service_spare','suggestion_product'));
    }
    public function Product(Request $request,$slug){
        $categories = ProductCategory::select('id','category_name','category_slug','banner_image')->orderBy('id','DESC')->get();
        $get_selected_brand = Brand::select('id','barnd_name','whatsapp')->where('barnd_slug',$slug)->first();
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
        $sub_categories = DB::select("SELECT a.category_slug,b.subcategory_name,b.subcategory_slug,b.banner_image FROM `product_categories` as a INNER JOIN product_sub_categories as b on a.id=b.category_id WHERE a.category_slug='$cat'");
        if(!empty($get_selected_subcategories)){
            $selected_subcategories = $get_selected_subcategories;
        }else{
            $selected_subcategories = [];
        }
        return view('product_list',compact('categories','selected_subcategories','sub_categories'));
    }
    public function VewProduct(Request $request,$subcat,$product){
        $categories = ProductCategory::select('id','category_name','category_slug','banner_image')->orderBy('id','DESC')->get();
        $get_selected_subcategories = ProductSubCategory::select('id','subcategory_name','subcategory_slug','page_title','page_description','page_keywords')->where('subcategory_slug',$subcat)->first();
        $pr = DB::select("SELECT a.id,a.category_id,a.product_name,b.category_name,c.subcategory_name,c.subcategory_slug,d.barnd_name,d.whatsapp,a.product_slug,a.main_image,a.sub_images,a.mrps,a.sale_price,a.about_this_item,a.amazon_link,a.page_title,a.video,a.page_description,a.page_keywords FROM `products` as a INNER JOIN product_categories as b on a.category_id=b.id INNER JOIN product_sub_categories as c on a.subcategory_id=c.id INNER JOIN brands as d on a.brand_id=d.id WHERE a.product_slug='$product'");
        $similar_pr = DB::select("SELECT a.id,a.product_name,c.subcategory_slug,d.barnd_name,a.product_slug,a.main_image,a.mrps,a.sale_price FROM `products` as a INNER JOIN product_categories as b on a.category_id=b.id INNER JOIN product_sub_categories as c on a.subcategory_id=c.id INNER JOIN brands as d on a.brand_id=d.id LIMIT 12");
        $reviews=[];
        if(!empty($pr[0])){
            $products = $pr[0];
            $product_feature = ProductFeature::select('id','feature_main_image','description')->where('product_id',$products->id)->first();
            $product_feature_details = ProductFeatureDetail::select('feature_title','feature_image','feature_details')->where('feature_id',$product_feature->id)->get();
            $product_specifications = ProductSpecifications::where('product_id',$products->id)->first();
            $reviews = DB::select("SELECT a.id,c.name,a.rating,a.title,a.description,a.status,a.created_at FROM `reviews` as a INNER JOIN products as b on a.product_id=b.id INNER JOIN users as c on a.user_id=c.id WHERE a.product_id=$products->id AND a.status=1 ORDER BY a.id DESC");
            $review_count = Review::where('product_id',$products->id)->where('status',1)->count();
            $total_avg = Review::where('product_id',$products->id)->where('status',1)->avg('rating');
            $rating = DB::select("SELECT count(*) as Total,rating from reviews WHERE product_id=$products->id AND status=1 group by rating order by rating desc");
            // dd($rating);
        }else{
            return redirect()->back()->with('error', 'Sorry! no product found');
        }
        if(!empty($get_selected_subcategories)){
            $selected_subcategories = $get_selected_subcategories;
        }else{
            $selected_subcategories = [];
        }
        return view('view_product',compact('categories','selected_subcategories','products','product_feature','product_feature_details','product_specifications','similar_pr','reviews','review_count','total_avg','rating'));
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
    public function NewsMedia(){
        $news_media = NewsMedia::where('id',1)->first();
        return view('news_media',compact('news_media'));
    }
    public function SendEnquiry(Request $request){
        $this->SendEnquiryMail($request);
        return redirect()->back()->with('success', 'Enquery Sent Successfully');
    }
    public function WantToBecomeDealer(Request $request){
        $this->SendDealerMail($request);
        return redirect()->back()->with('success', 'Enquery Sent Successfully');
    }
    /**
     * cart starts
    */
    public function Initiate(){
        $receiptId = Str::random(20);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => 47389.6 * 100,
            'currency' => 'INR'
            )
        );
        $response = [
            'orderId' => $order['id']
        ];
        return $response;
    }
    public function cart(){
        $similar_pr = [];
        $users = Auth::user();
        $offer_coupn = OfferCoupon::select('code','offer_type','offer_value','title','min_booking')->where('show_web',1)->get();
        if(!empty($users)){
            if($users->type=='user'){
                if(!empty(session()->get('cart'))){
                    $cart = session()->get('cart');
                    $cart_data=Product::select('id','product_name','product_slug','main_image','mrps','sale_price')->whereIn('id',array_keys($cart))->get();
                    session()->forget('cart');
                    foreach($cart_data as $rows){
                        $carts = Cart::where('user_id',$users->id)->where('product_id',$rows->id)->first();
                        if(empty($carts)){
                            $carts = new Cart();
                            $carts->user_id = $users->id;
                            $carts->product_id = $rows->id;
                            $carts->quantity = $cart[$rows->id]['quantity'];
                            $carts->save();
                            return redirect('cart');
                        }
                    }
                }else{
                    $getcart = DB::select("SELECT id,product_name,product_slug,main_image,mrps,sale_price FROM `products` WHERE id IN (SELECT product_id FROM `carts` WHERE user_id=$users->id)");
                    if(!empty($getcart)){
                        $cart_data = $getcart;
                        $similar_pr = DB::select("SELECT a.id,a.product_name,c.subcategory_slug,d.barnd_name,a.product_slug,a.main_image,a.mrps,a.sale_price FROM `products` as a INNER JOIN product_categories as b on a.category_id=b.id INNER JOIN product_sub_categories as c on a.subcategory_id=c.id INNER JOIN brands as d on a.brand_id=d.id LIMIT 12");
                    }else{
                        return redirect('')->with('error', 'No data found in cart');
                    }
                }
            }else{
                return redirect()->back()->with('error', 'You have login with admin account please login with user account');
            }
        }else{
            $cart = session()->get('cart');
            $cart_data=[];
            if(!empty($cart)){
                $cart_data=Product::select('id','product_name','product_slug','main_image','mrps','sale_price')->whereIn('id',array_keys($cart))->get();
                $similar_pr = DB::select("SELECT a.id,a.product_name,c.subcategory_slug,d.barnd_name,a.product_slug,a.main_image,a.mrps,a.sale_price FROM `products` as a INNER JOIN product_categories as b on a.category_id=b.id INNER JOIN product_sub_categories as c on a.subcategory_id=c.id INNER JOIN brands as d on a.brand_id=d.id LIMIT 12");
            }else{
                return redirect()->back()->with('error', 'Sorrry! No product in cart');
            }
        }
        $initiate = $this->Initiate();
        return view('cart',compact('cart_data','offer_coupn','similar_pr','initiate'));
    }
    public function addToCart($id){
        $product = Product::findOrFail($id);
        $users = Auth::user();
        if(!empty($users)){
            $carts = new Cart();
            $carts->user_id = $users->id;
            $carts->product_id = $product->id;
            $carts->quantity = 1;
            $carts->save();
        }else{
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
        }
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request){
        if($request->id && $request->quantity){
            $users = Auth::user();
            if(!empty($users)){
                $carts = Cart::where('user_id',$users->id)->where('product_id',$request->id)->first();
                if(!empty($carts)){
                    $carts->quantity = $request->quantity;
                    $carts->save();
                }else{
                    $carts = new Cart();
                    $carts->user_id = $users->id;
                    $carts->product_id = $request->id;
                    $carts->quantity = 1;
                    $carts->save();
                }
            }else{
                $cart = session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
            }
        }
    }
    public function remove(Request $request){
        if($request->id) {
            $users = Auth::user();
            if(!empty($users)){
                $carts = Cart::where('user_id',$users->id)->where('product_id',$request->id)->delete();
            }else{
                $cart = session()->get('cart');
                if(isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function ApplyCoupon(Request $request){
        if(!empty($request->coupon) && !empty($request->min_booking)){
            $offer_coupn = OfferCoupon::select('offer_type','offer_value','min_booking')->where('code',$request->coupon)->first();
            if($request->min_booking > $offer_coupn->min_booking){
                $data['offer_type']     =$offer_coupn->offer_type;
                $data['offer_value']    =$offer_coupn->offer_value;
                $data['coupon']         =$request->coupon;
                session()->forget('coupon');
                $coupon = session()->get('coupon');
                if(empty($coupon)) {
                    session()->put('coupon',$data);
                }
                return redirect()->back()->with('success', 'Coupon added successfully!');
            }else{
                return redirect()->back()->with('success', 'Coupan Can apply on minimum booking of : '.$offer_coupn->min_booking);
            }
        }
    }
    public function RemoveCoupon(Request $request){
        if(!empty($request->coupon) && !empty($request->min_booking)){
            session()->forget('coupon');
        }
        return redirect()->back()->with('success', 'Coupon removed successfully!');
    }
    /**
     * cart Ends
    */
    public function AccountLogin(){
        $users = Auth::user();
        if(!empty($users)){
            return redirect()->back()->with('error', 'Sorry! You have already logged in');
        }else{
            return view('account_login');
        }
    }
    public function SendEnquiryMail($data){
        $em = Setting::select('value')->where('name','smpp_email')->first();
        $email = $em->value;
        try {
            $template_data = [
                'email'         => $data->email,
                'name'          => $data->f_name.' '.$data->l_name,
                'mobile'        => $data->mobile,
                'description'   => $data->description,
                'subject'       => 'New enquiry From '.$data->f_name.' '.$data->l_name,
            ];
            $contact = new ContactQuery();
            $contact->email = $data->email;
            $contact->name = $data->f_name.' '.$data->l_name;
            $contact->phone = $data->mobile;
            $contact->message = $data->description;
            $contact->save();
            $setting = Setting::select('value')->where('name','smpp')->first();
            if($setting->value=='true'){
                Mail::send(['html'=>'email.enquiry'], $template_data,
                    function ($message) use ($email,$template_data) {
                        $message->to($email)->from("codestoresolution@gmail.com")->subject($template_data['subject']);
                });
            }
            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    public function SendDealerMail($data){
        $em = Setting::select('value')->where('name','smpp_email')->first();
        $email = $em->value;
        try {
            $template_data = [
                'email'         => $data->email,
                'name'          => $data->name,
                'mobile'        => $data->mobile,
                'description'   => $data->description,
                'subject'       => 'Want to become a dealer '.$data->f_name.' '.$data->l_name,
            ];
            $contact = new DealerQuery();
            $contact->url = $data->url;
            $contact->email = $data->email;
            $contact->name = $data->name;
            $contact->phone = $data->mobile;
            $contact->city = $data->city;
            $contact->message = $data->description;
            $contact->save();
            $setting = Setting::select('value')->where('name','smpp')->first();
            if($setting->value=='true'){
                Mail::send(['html'=>'email.enquiry'], $template_data,
                    function ($message) use ($email,$template_data) {
                        $message->to($email)->from("codestoresolution@gmail.com")->subject($template_data['subject']);
                });
            }
            return true;
        } catch (Exception $ex) {
            return false;
        }  
    }
    public function AddReviews(Request $request){
        if(!empty($request->all())){
            $user = Auth::user();
            $review = Review::where('user_id',$user->id)->where('product_id',$request->product_id)->first();
            if(!empty($review)){
                $review->rating = $request->st;
                $review->title = $request->title;
                $review->description = $request->description;
                if($request->file('video_audio')){
                    $extension = $request->video_audio->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->video_audio->move('public/reviews/',$fileNameToStore);
                    $review->video_audio = 'reviews/'.$fileNameToStore;
                }
                $review->save();
                return redirect()->back()->with('success', 'Your review has been updated successfully');
            }else{
                $review = new Review();
                $review->user_id = $user->id;
                $review->product_id = $request->product_id;
                $review->rating = $request->st;
                $review->title = $request->title;
                $review->description = $request->description;
                if($request->file('video_audio')){
                    $extension = $request->video_audio->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->video_audio->move('public/reviews/',$fileNameToStore);
                    $review->video_audio = 'reviews/'.$fileNameToStore;
                }
                $review->save();
                return redirect()->back()->with('success', 'Your review has been updated successfully');
            }
        }
    }
    public function Checkout(){
        $similar_pr = [];
        $users = Auth::user();
        $offer_coupn = OfferCoupon::select('code','offer_type','offer_value','title','min_booking')->where('show_web',1)->get();
        if(!empty($users)){
            $getcart = DB::select("SELECT id,product_name,product_slug,main_image,mrps,sale_price FROM `products` WHERE id IN (SELECT product_id FROM `carts` WHERE user_id=$users->id)");
            if(!empty($getcart)){
                $cart_data = $getcart;
                $similar_pr = DB::select("SELECT a.id,a.product_name,c.subcategory_slug,d.barnd_name,a.product_slug,a.main_image,a.mrps,a.sale_price FROM `products` as a INNER JOIN product_categories as b on a.category_id=b.id INNER JOIN product_sub_categories as c on a.subcategory_id=c.id INNER JOIN brands as d on a.brand_id=d.id LIMIT 12");
            }else{
                return redirect('')->with('error', 'No data found in cart');
            }
        }        
        $initiate = $this->Initiate();
        return view('checkout',compact('cart_data','offer_coupn','similar_pr','initiate'));
    }
    public function ProceedToPay(Request $request){
        if(!empty($request->all())){
            $auth = Auth::user();
            $checkout = Checkout::where('user_id',$auth->id)->first();
            if(!empty($checkout)){
                $pay->first_name = $request->first_name;
                $pay->last_name = $request->last_name;
                $pay->country = $request->country;
                $pay->street_address = $request->street_address;
                $pay->apartment = $request->apartment;
                $pay->city = $request->city;
                $pay->state = $request->state;
                $pay->pincode = $request->pincode;
                $pay->phone = $request->phone;
                $pay->email = $request->email;
                $pay->shipping_address = $request->shipping_address;
                $pay->order_note = $request->order_note;
                $pay->save();
            }else{
                $pay->user_id = $auth->id;
                $pay->first_name = $request->first_name;
                $pay->last_name = $request->last_name;
                $pay->country = $request->country;
                $pay->street_address = $request->street_address;
                $pay->apartment = $request->apartment;
                $pay->city = $request->city;
                $pay->state = $request->state;
                $pay->pincode = $request->pincode;
                $pay->phone = $request->phone;
                $pay->email = $request->email;
                $pay->shipping_address = $request->shipping_address;
                $pay->order_note = $request->order_note;
                $pay->save();
            }
        }
        return view('proceed_to_pay');
    }
}