<?php
namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PageContent;
use App\Models\ContactQuery;
use App\Models\DealerQuery;
use App\Models\ProductCategory;
use App\Models\ServiceSpare;
use App\Models\OurBrand;
use App\Models\VisionInnovation;
use App\Models\ProductSubCategory;
use App\Models\Home;
use App\Models\SuggestionProduct;
use App\Models\Faq;
use App\Models\Review;
use App\Models\FaqCategory;
use App\Models\NewsMedia;
use App\Models\Blog;
use Auth;
use DB;
class SuperadminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function AddStaff(Request $request){
        $result = User::where('type','!=',2)->orderBy('id','DESC')->get();
        if(!empty($request->id)){
            $update = User::where('id',$request->id)->orderBy('id','DESC')->first();
            $update->name = $request->name;
            $update->email = $request->email;
            $update->mobile = $request->mobile;
            $update->type = $request->type;
            if(!empty($request->password)){
                if($request->password==$request->password_confirmation){
                    $update->password = Hash::make($request->password);
                }else{
                    return redirect('admin/add-staff')->with('error','Password Not Matched');
                }
            }
            $update->user_id = Auth::user()->id;
            $update->save();
            return redirect('admin/add-staff')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $newuser = new User();
                $newuser->name = $request->name;
                $newuser->email = $request->email;
                $newuser->mobile = $request->mobile;
                $newuser->type = $request->type;
                if($request->password==$request->password_confirmation){
                    $newuser->password = Hash::make($request->password);
                }else{
                    return redirect('admin/add-staff')->with('error','Password Not Matched');
                }
                $newuser->user_id = Auth::user()->id;
                $newuser->save();
                return redirect('admin/add-staff')->with('success','Saved successfully');
            }
        }
        return view('superadmin/add_staff',compact('result'));
    }
    public function UsersCustomers(Request $request){
        $result = User::where('type',2)->orderBy('id','DESC')->get();
        return view('superadmin/users_customers',compact('result'));
    }
    public function Reviews(){
        $result = DB::select("SELECT a.id,c.name,c.email,c.mobile,b.product_name,b.main_image,a.rating,a.title,a.description,a.status,a.created_at FROM `reviews` as a INNER JOIN products as b on a.product_id=b.id INNER JOIN users as c on a.user_id=c.id ORDER BY a.id DESC");
        return view('superadmin/reviews',compact('result'));
    }
    public function ReviewsApprove($id){
        $review = Review::where('id',$id)->first();
        $review->status = 1;
        $review->save();
        return redirect('admin/reviews')->with('success','Approved successfully');
    }
    public function ReviewsUnapprove($id){
        $review = Review::where('id',$id)->first();
        $review->status = '0';
        $review->save();
        return redirect('admin/reviews')->with('success','Unapproved successfully');
    }
    public function UpdateStaff(Request $request,$id){
        $update = User::where('id',$id)->orderBy('id','DESC')->first();
        $result = User::where('type','!=',2)->orderBy('id','DESC')->get();
        return view('superadmin/add_staff',compact('result','update'));
    }
    public function DeleteStaff(Request $request,$id){
        User::where('id',$id)->delete();
        return redirect('admin/add-staff')->with('error','Deleted successfully');
    }
    public function DeleteReviews($id){
        Review::where('id',$id)->delete();
        return redirect('admin/reviews')->with('error','Deleted successfully');
    }

    public function AboutUs(Request $request){
        $PageContent = PageContent::select('id','image','text','page_title','description','keyword')->where('page_name','about-us')->first();
        if(!empty($PageContent) && $request->id){
            $PageContent->page_name = "about-us";
            $PageContent->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $PageContent->image = $imageName;
            }
            $PageContent->page_title = $request->page_title;
            $PageContent->description = $request->description;
            $PageContent->keyword = $request->keyword;
            $PageContent->save();
            return redirect('admin/about-us')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $aboutus = new PageContent();
            $aboutus->page_name = "about-us";
            $aboutus->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $aboutus->image = $imageName;
            }
            $aboutus->page_title = $request->page_title;
            $aboutus->description = $request->description;
            $aboutus->keyword = $request->keyword;
            $aboutus->save();
            return redirect('admin/about-us')->with('success','Saved successfuly');
        }
        return view('superadmin/about_us',compact('PageContent'));
    }
    public function Support(Request $request){
        $SupportPageContent = PageContent::select('id','image','text','page_title','description','keyword')->where('page_name','support')->first();
        if(!empty($SupportPageContent) && $request->id){
            $SupportPageContent->page_name = "support";
            $SupportPageContent->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $SupportPageContent->image = $imageName;
            }
            $SupportPageContent->page_title = $request->page_title;
            $SupportPageContent->description = $request->description;
            $SupportPageContent->keyword = $request->keyword;
            $SupportPageContent->save();
            return redirect('admin/support')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $support = new PageContent();
            $support->page_name = "support";
            $support->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $support->image = $imageName;
            }
            $support->page_title = $request->page_title;
            $support->description = $request->description;
            $support->keyword = $request->keyword;
            $support->save();
            return redirect('admin/support')->with('success','Saved successfuly');
        }
        return view('superadmin/support',compact('SupportPageContent'));
    }
    
    public function ContactUs(Request $request){
        $ContactPageContent = PageContent::select('id','map_link','page_title','description','keyword')->where('page_name','contact-us')->first();
        if(!empty($ContactPageContent) && $request->id){
            $ContactPageContent->page_name = "contact-us";
            $ContactPageContent->map_link = $request->map_link;
            $ContactPageContent->page_title = $request->page_title;
            $ContactPageContent->description = $request->description;
            $ContactPageContent->keyword = $request->keyword;
            $ContactPageContent->save();
            return redirect('admin/contact-us')->with('success','Updated successfuly');
        }
        if(!empty($request->map_link)){
            $contactus = new PageContent();
            $contactus->page_name = "contact-us";
            $contactus->map_link = $request->map_link;
            $contactus->page_title = $request->page_title;
            $contactus->description = $request->description;
            $contactus->keyword = $request->keyword;
            $contactus->save();
            return redirect('admin/contact-us')->with('success','Saved successfuly');
        }
        return view('superadmin/contact_us',compact('ContactPageContent'));
    }
    public function BecomeDealer(Request $request){
        $BDealerPageContent = PageContent::select('id','text','page_title','description','keyword')->where('page_name','become-dealer')->first();
        if(!empty($BDealerPageContent) && $request->id){
            $BDealerPageContent->page_name = "become-dealer";
            $BDealerPageContent->text = $request->text;
            $BDealerPageContent->page_title = $request->page_title;
            $BDealerPageContent->description = $request->description;
            $BDealerPageContent->keyword = $request->keyword;
            $BDealerPageContent->save();
            return redirect('admin/become-dealer')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $becomedealer = new PageContent();
            $becomedealer->page_name = "become-dealer";
            $becomedealer->text = $request->text;
            $becomedealer->page_title = $request->page_title;
            $becomedealer->description = $request->description;
            $becomedealer->keyword = $request->keyword;
            $becomedealer->save();
            return redirect('admin/become-dealer')->with('success','Saved successfuly');
        }
        return view('superadmin/become_dealer',compact('BDealerPageContent'));
    }
    public function SparesAndServices(Request $request){
        $SparAndServPageCont = PageContent::select('id','image','text','page_title','description','keyword')->where('page_name','spares-and-services')->first();
        if(!empty($SparAndServPageCont) && $request->id){
            $SparAndServPageCont->page_name = "spares-and-services";
            $SparAndServPageCont->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $SparAndServPageCont->image = $imageName;
            }
            $SparAndServPageCont->page_title = $request->page_title;
            $SparAndServPageCont->description = $request->description;
            $SparAndServPageCont->keyword = $request->keyword;
            $SparAndServPageCont->save();
            return redirect('admin/spares-and-services')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $sparesandservices = new PageContent();
            $sparesandservices->page_name = "spares-and-services";
            $sparesandservices->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $sparesandservices->image = $imageName;
            }
            $sparesandservices->page_title = $request->page_title;
            $sparesandservices->description = $request->description;
            $sparesandservices->keyword = $request->keyword;
            $sparesandservices->save();
            return redirect('admin/spares-and-services')->with('success','Saved successfuly');
        }
        return view('superadmin/spares_and_services',compact('SparAndServPageCont'));
    }
    public function DemoAndInstallation(Request $request){
        $demoInstaPageCont = PageContent::select('id','image','text','page_title','description','keyword')->where('page_name','demo-and-installation')->first();
        if(!empty($demoInstaPageCont) && $request->id){
            $demoInstaPageCont->page_name = "demo-and-installation";
            $demoInstaPageCont->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $demoInstaPageCont->image = $imageName;
            }
            $demoInstaPageCont->page_title = $request->page_title;
            $demoInstaPageCont->description = $request->description;
            $demoInstaPageCont->keyword = $request->keyword;
            $demoInstaPageCont->save();
            return redirect('admin/demo-and-installation')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $demoandinstallation = new PageContent();
            $demoandinstallation->page_name = "demo-and-installation";
            $demoandinstallation->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $demoandinstallation->image = $imageName;
            }
            $demoandinstallation->page_title = $request->page_title;
            $demoandinstallation->description = $request->description;
            $demoandinstallation->keyword = $request->keyword;
            $demoandinstallation->save();
            return redirect('admin/demo-and-installation')->with('success','Saved successfuly');
        }
        return view('superadmin/demo_and_installation',compact('demoInstaPageCont'));
    }
    public function TermsAndCondition(Request $request){
        $TermsAndCondiPageCont = PageContent::select('id','text')->where('page_name','terms-and-condition')->first();
        if(!empty($TermsAndCondiPageCont) && $request->id){
            $TermsAndCondiPageCont->page_name = "terms-and-condition";
            $TermsAndCondiPageCont->text = $request->text;
            $TermsAndCondiPageCont->save();
            return redirect('admin/terms-and-condition')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $termsandcondition = new PageContent();
            $termsandcondition->page_name = "terms-and-condition";
            $termsandcondition->text = $request->text;
            $termsandcondition->save();
            return redirect('admin/terms-and-condition')->with('success','Saved successfuly');
        }
        return view('superadmin/terms_and_condition',compact('TermsAndCondiPageCont'));
    }
    public function Offers(Request $request){
        $resultOffers = PageContent::orderBy('id','DESC')->where('page_name','offers')->get();
        if(!empty($request->id)){
            $offers = PageContent::where('id',$request->id)->first();
            $offers->page_name = "offers";
            $offers->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $offers->image = $imageName;
            }
            $offers->link = $request->link;
            $offers->page_title = $request->page_title;
            $offers->description = $request->description;
            $offers->keyword = $request->keyword;
            $offers->save();
            return redirect('admin/offers')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $offers = new PageContent();
            $offers->page_name = "offers";
            $offers->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $offers->image = $imageName;
            }
            $offers->link = $request->link;
            $offers->page_title = $request->page_title;
            $offers->description = $request->description;
            $offers->keyword = $request->keyword;
            $offers->save();
            return redirect('admin/offers')->with('success','Saved successfuly');
        }
        return view('superadmin/offers',compact('resultOffers'));
    }
    public function UpdateOffer(Request $request,$id){
        $updateOffer = PageContent::where('id',$id)->orderBy('id','DESC')->first();
        $resultOffer = PageContent::orderBy('id','DESC')->get();
        return view('superadmin/offers',compact('resultOffer','updateOffer'));
    }
    public function DeleteOffer(Request $request,$id){
        PageContent::where('id',$id)->delete();
        return redirect('admin/offers')->with('success','Deleted successfully');
    }
    public function Blogs(Request $request){
        $resultBlog = Blog::orderBy('id','DESC')->get();
        if(!empty($request->id)){
            $blog = Blog::where('id',$request->id)->first();
            $blog->title = $request->title;
            $blog->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $blog->image = $imageName;
            }
            $blog->save();
            return redirect('admin/blog')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->text = $request->text;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $blog->image = $imageName;
            }
            $blog->save();
            return redirect('admin/blog')->with('success','Saved successfuly');
        }
        return view('superadmin/blog',compact('resultBlog'));
    }
    public function UpdateBlog(Request $request,$id){
        $updateBlog = Blog::where('id',$id)->orderBy('id','DESC')->first();
        $resultBlog = Blog::orderBy('id','DESC')->get();
        return view('superadmin/blog',compact('resultBlog','updateBlog'));
    }
    public function DeleteBlog(Request $request,$id){
        Blog::where('id',$id)->delete();
        return redirect('admin/blog')->with('success','Deleted successfully');
    }
    public function ContactQuery(Request $request){
        if(!empty($request->start_date) && !empty($request->end_date)){
            $startDate = date_format(date_create($request->start_date),'Y-m-d');
            $endDate = date_format(date_create($request->end_date),'Y-m-d');
            $contactQuery = ContactQuery::whereBetween('created_at', [$startDate, $endDate])->orderBy('id','DESC')->get();
        }else{
            $contactQuery = ContactQuery::skip(0)->take(10)->orderBy('id','DESC')->get();
        }
        return view('superadmin/contact_query',compact('contactQuery'));
    }
    public function DealerQuery(Request $request){
        if(!empty($request->start_date) && !empty($request->end_date)){
            $startDate = date_format(date_create($request->start_date),'Y-m-d');
            $endDate = date_format(date_create($request->end_date),'Y-m-d');
            $dealerQuery = DealerQuery::where('url','become-dealer')->whereBetween('created_at', [$startDate, $endDate])->orderBy('id','DESC')->get();
        }else{
            $dealerQuery = DealerQuery::where('url','become-dealer')->skip(0)->take(10)->orderBy('id','DESC')->get();
        }
        return view('superadmin/dealer_query',compact('dealerQuery'));
    }
    public function FAQ(Request $request){
        $faqcategory = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        $resultFaq = DB::select("SELECT b.category_name,a.id,a.title,a.text,a.category_id FROM `faqs` AS a INNER JOIN product_categories AS b ON a.category_id=b.id ORDER BY a.id DESC");
        if(!empty($request->id)){
            $faq = Faq::where('id',$request->id)->first();
            $faq->category_id = $request->category_id;
            $faq->title = $request->title;
            $faq->text = $request->text;
            $faq->save();
            return redirect('admin/faq')->with('success','Update successfuly');
        }
        if(!empty($request->text)){
            $faq = new Faq();
            $faq->category_id = $request->category_id;
            $faq->title = $request->title;
            $faq->text = $request->text;
            $faq->save();
            return redirect('admin/faq')->with('success','Saved successfuly');
        }
        return view('superadmin/faq',compact('resultFaq','faqcategory'));
    }
    public function UpdateFaq(Request $request,$id){
        $updateFaq = Faq::where('id',$id)->orderBy('id','DESC')->first();
        $faqcategory = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('superadmin/faq',compact('updateFaq','faqcategory'));
    }
    public function DeleteFaq(Request $request,$id){
        Faq::where('id',$id)->delete();
        return redirect('admin/faq')->with('success','Deleted successfully');
    }
    public function NewsMedia(Request $request){
        $resultNewsMe = NewsMedia::where('id',1)->first();
        if(!empty($request->text)){
            $newsMedia = new NewsMedia();
            $newsMedia->text = $request->text;
            if(!empty($request->image_certificate)){
                $extension = $request->image_certificate->getClientOriginalExtension();
                $fileNameToStore = $request->image_certificate.'.'.$extension;
                $imageName = $request->image_certificate->move('public/pages/',$fileNameToStore);
                $newsMedia->image_certificate = $imageName;
            }
            if(!empty($request->market_place_logos)){
                $extension = $request->market_place_logos->getClientOriginalExtension();
                $fileNameToStore = $request->market_place_logos.'.'.$extension;
                $imageName = $request->market_place_logos->move('public/pages/',$fileNameToStore);
                $newsMedia->market_place_logos = $imageName;
            }
            if(!empty($request->vendor_logos)){
                $extension = $request->vendor_logos->getClientOriginalExtension();
                $fileNameToStore = $request->vendor_logos.'.'.$extension;
                $imageName = $request->vendor_logos->move('public/pages/',$fileNameToStore);
                $newsMedia->vendor_logos = $imageName;
            }
            if(!empty($request->media_image_normal)){
                $extension = $request->media_image_normal->getClientOriginalExtension();
                $fileNameToStore = $request->media_image_normal.'.'.$extension;
                $imageName = $request->media_image_normal->move('public/pages/',$fileNameToStore);
                $newsMedia->media_image_normal = $imageName;
            }
            if(!empty($request->media_image_enlarge)){
                $extension = $request->media_image_enlarge->getClientOriginalExtension();
                $fileNameToStore = $request->media_image_enlarge.'.'.$extension;
                $imageName = $request->media_image_enlarge->move('public/pages/',$fileNameToStore);
                $newsMedia->media_image_enlarge = $imageName;
            }
            $newsMedia->page_title = $request->page_title;
            $newsMedia->description = $request->description;
            $newsMedia->keywords = $request->keywords;
            $newsMedia->save();
            return redirect('admin/news-media')->with('success','Saved successfuly');
        }
        return view('superadmin/news_media',compact('resultNewsMe'));
    }
    public function HomePage(Request $request){
        $update = Home::where('id',1)->first();
        $our_brand = OurBrand::get();
        $our_brand_count = OurBrand::count();
        $vision_innovation = VisionInnovation::get();
        $service_spare = ServiceSpare::get();
        $subcategory = ProductSubCategory::get();
        $suggestion_product = SuggestionProduct::get();
        $suggestion_product_count = SuggestionProduct::count();
        $up = $update;
        if(!empty($request->all())){
            if(!empty($up)){
                if($request->file('logo')){
                    $extension = $request->logo->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->logo->move('public/logo/',$fileNameToStore);
                    $up->logo = 'logo/'.$fileNameToStore;
                }
                if($request->file('future_image')){
                    $extension = $request->future_image->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->future_image->move('public/future_image/',$fileNameToStore);
                    $up->future_image = 'future_image/'.$fileNameToStore;
                }
                if($request->file('heritage_image')){
                    $extension = $request->heritage_image->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->heritage_image->move('public/heritage_image/',$fileNameToStore);
                    $up->heritage_image = 'heritage_image/'.$fileNameToStore;
                }
                $up->banner_video = $request->banner_video;
                $up->brand_text = $request->brand_text_desc;
                $up->future_title = $request->future_title;
                $up->future_text = $request->future_text;
                $up->future_link = $request->future_link;
                $up->heritage_tile = $request->heritage_tile;
                $up->heritage_text = $request->heritage_text;
                $up->heritage_link = $request->heritage_link;
                $up->facebook_sr = $request->facebook_sr;
                $up->facebook = $request->facebook;
                $up->insta_sr = $request->insta_sr;
                $up->insta = $request->insta;
                $up->twitter_sr = $request->twitter_sr;
                $up->twitter = $request->twitter;
                $up->youtube_sr = $request->youtube_sr;
                $up->youtube = $request->youtube;
                $up->linkdin_sr = $request->linkdin_sr;
                $up->linkdin = $request->linkdin;
                $up->page_title = $request->page_title;
                $up->page_description = $request->page_description;
                $up->page_keywords = $request->page_keywords;
                $up->whatsapp_no = $request->whatsapp_no;
            }else{
                $up = new Home();
                if($request->file('logo')){
                    $extension = $request->logo->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->logo->move('public/logo/',$fileNameToStore);
                    $up->logo = 'logo/'.$fileNameToStore;
                }
                if($request->file('future_image')){
                    $extension = $request->future_image->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->future_image->move('public/future_image/',$fileNameToStore);
                    $up->future_image = 'future_image/'.$fileNameToStore;
                }
                if($request->file('heritage_image')){
                    $extension = $request->heritage_image->getClientOriginalExtension();
                    $fileNameToStore = time().'.'.$extension;
                    $assetUrl = $request->heritage_image->move('public/heritage_image/',$fileNameToStore);
                    $up->heritage_image = 'heritage_image/'.$fileNameToStore;
                }
                $up->banner_video = $request->banner_video;
                $up->brand_text = $request->brand_text_desc;
                $up->future_title = $request->future_title;
                $up->future_text = $request->future_text;
                $up->future_link = $request->future_link;
                $up->heritage_tile = $request->heritage_tile;
                $up->heritage_text = $request->heritage_text;
                $up->heritage_link = $request->heritage_link;
                $up->facebook_sr = $request->facebook_sr;
                $up->facebook = $request->facebook;
                $up->insta_sr = $request->insta_sr;
                $up->insta = $request->insta;
                $up->twitter_sr = $request->twitter_sr;
                $up->twitter = $request->twitter;
                $up->youtube_sr = $request->youtube_sr;
                $up->youtube = $request->youtube;
                $up->linkdin_sr = $request->linkdin_sr;
                $up->linkdin = $request->linkdin;
                $up->page_title = $request->page_title;
                $up->page_description = $request->page_description;
                $up->page_keywords = $request->page_keywords;
                $up->whatsapp_no = $request->whatsapp_no;
            }
            $up->save();
            $this->OurBrands($request);
            $this->VisionInnovations($request);
            $this->ServiceSpares($request);
            $this->SuggestionProducts($request);
            return redirect()->back()->with('success', 'Saved successfuly');
        }
        return view('superadmin/home_page',compact('update','our_brand','our_brand_count','vision_innovation','service_spare','subcategory','suggestion_product','suggestion_product_count'));
    }
    public function OurBrands($request){
        for($i=0;$i < count($request->sr_no);$i++){
            if(!empty($request->sr_no[$i])){
                $brand = OurBrand::where('id',@$request->brnd_id[$i])->first();
                if(!empty($brand)){
                    $brand->sr_no = $request->sr_no[$i];
                    $brand->title = $request->brand_title[$i];
                    if(!empty($request->file('main_image')[$i])){
                        $extension = $request->main_image[$i]->getClientOriginalExtension();
                        $fileNameToStore = 'main'.$i.time().'.'.$extension;
                        $assetUrl = $request->main_image[$i]->move('public/home/',$fileNameToStore);
                        $brand->main_image = 'home/'.$fileNameToStore;
                    }
                    if(!empty($request->file('brand_logo')[$i])){
                        $extension = $request->brand_logo[$i]->getClientOriginalExtension();
                        $fileNameToStore = 'brand_logo'.$i.time().'.'.$extension;
                        $assetUrl = $request->brand_logo[$i]->move('public/home/',$fileNameToStore);
                        $brand->logo = 'home/'.$fileNameToStore;
                    }
                    if(!empty($request->file('sub_img_1')[$i])){
                        $extension = $request->sub_img_1[$i]->getClientOriginalExtension();
                        $fileNameToStore = 'sub_img_1'.$i.time().'.'.$extension;
                        $assetUrl = $request->sub_img_1[$i]->move('public/home/',$fileNameToStore);
                        $brand->sub_img_1 = 'home/'.$fileNameToStore;
                    }
                    if(!empty($request->file('sub_img_2')[$i])){
                        $extension = $request->sub_img_2[$i]->getClientOriginalExtension();
                        $fileNameToStore = 'sub_img_2'.$i.time().'.'.$extension;
                        $assetUrl = $request->sub_img_2[$i]->move('public/home/',$fileNameToStore);
                        $brand->sub_img_2 = 'home/'.$fileNameToStore;
                    }
                    $brand->text = $request->brand_text[$i];
                    $brand->link = $request->brand_link[$i];
                    $brand->save();
                }else{
                    if(!empty($request->brand_title[$i])){
                        $brand = new OurBrand();
                        $brand->sr_no = $request->sr_no[$i];
                        $brand->title = $request->brand_title[$i];
                        if(!empty($request->file('main_image')[$i])){
                            $extension = $request->main_image[$i]->getClientOriginalExtension();
                            $fileNameToStore = 'main'.$i.time().'.'.$extension;
                            $assetUrl = $request->main_image[$i]->move('public/home/',$fileNameToStore);
                            $brand->main_image = 'home/'.$fileNameToStore;
                        }
                        if(!empty($request->file('brand_logo')[$i])){
                            $extension = $request->brand_logo[$i]->getClientOriginalExtension();
                            $fileNameToStore = 'brand_logo'.$i.time().'.'.$extension;
                            $assetUrl = $request->brand_logo[$i]->move('public/home/',$fileNameToStore);
                            $brand->logo = 'home/'.$fileNameToStore;
                        }
                        if(!empty($request->file('sub_img_1')[$i])){
                            $extension = $request->sub_img_1[$i]->getClientOriginalExtension();
                            $fileNameToStore = 'sub_img_1'.$i.time().'.'.$extension;
                            $assetUrl = $request->sub_img_1[$i]->move('public/home/',$fileNameToStore);
                            $brand->sub_img_1 = 'home/'.$fileNameToStore;
                        }
                        if(!empty($request->file('sub_img_2')[$i])){
                            $extension = $request->sub_img_2[$i]->getClientOriginalExtension();
                            $fileNameToStore = 'sub_img_2'.$i.time().'.'.$extension;
                            $assetUrl = $request->sub_img_2[$i]->move('public/home/',$fileNameToStore);
                            $brand->sub_img_2 = 'home/'.$fileNameToStore;
                        }
                        $brand->text = $request->brand_text[$i];
                        $brand->link = $request->brand_link[$i];
                        $brand->save();
                    }
                }
            }
        }
    }
    public function VisionInnovations($request){
        for($i=0;$i < count($request->v_id);$i++){
            if(!empty($request->v_id[$i])){
                $vision = VisionInnovation::where('id',$request->v_id[$i])->first();
                $vision->sr_no = $request->v_sr[$i];
                if(!empty($request->file('v_image')[$i])){
                    $extension = $request->v_image[$i]->getClientOriginalExtension();
                    $fileNameToStore = $request->v_id[$i].'main'.$i.time().'.'.$extension;
                    $assetUrl = $request->v_image[$i]->move('public/home/',$fileNameToStore);
                    $vision->main_image = 'home/'.$fileNameToStore;
                }
                $vision->link = $request->v_link[$i];
                $vision->save();
            }
        }
    }
    public function ServiceSpares($request){
        for($i=0;$i < count($request->s_id);$i++){
            if(!empty($request->s_id[$i])){
                $spare = ServiceSpare::where('id',$request->s_id[$i])->first();
                $spare->sr_no = $request->s_sr[$i];
                if(!empty($request->file('s_image')[$i])){
                    $extension = $request->s_image[$i]->getClientOriginalExtension();
                    $fileNameToStore = $request->s_id[$i].'main'.$i.time().'.'.$extension;
                    $assetUrl = $request->s_image[$i]->move('public/home/',$fileNameToStore);
                    $spare->main_image = 'home/'.$fileNameToStore;
                }
                $spare->title = $request->s_title[$i];
                $spare->description = $request->s_description[$i];
                $spare->link = $request->s_link[$i];
                $spare->save();
            }
        }
    }
    public function SuggestionProducts($request){
        for($i=0;$i < count($request->sugg_title);$i++){
            if(!empty($request->sugg_title[$i])){
                $sugg = SuggestionProduct::where('id',@$request->sugg_id[$i])->first();
                if(!empty($sugg)){
                    $sugg->sr_no = $request->sugg_sr_no[$i];
                    $sugg->title = $request->sugg_title[$i];
                    $sugg->product_id = $request->product_id[$i];
                    $sugg->sku = $request->sku[$i];
                    $sugg->save();
                }else{
                    $sugg = new SuggestionProduct();
                    $sugg->user_id = Auth::user()->id;
                    $sugg->sr_no = $request->sugg_sr_no[$i];
                    $sugg->title = $request->sugg_title[$i];
                    $sugg->product_id = $request->product_id[$i];
                    $sugg->sku = $request->sku[$i];
                    $sugg->save();
                }
            }
        }
    }
    public function HomeBrand($id){
        OurBrand::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Deleted successfuly');
    }
    public function BetterTogetherProduct(Request $request){
        $result=[];
        return view('superadmin/better_together_product',compact('result'));
    }
    public function Tickets(){ 
        $result=[];
        return view('superadmin/tickets',compact('result'));
    }
    public function ViewOrder(){
        $result=[];
        return view('superadmin/view_order',compact('result'));
    }
    public function OrderReports(){
        $result=[];
        return view('superadmin/order_reports',compact('result'));
    }
}
