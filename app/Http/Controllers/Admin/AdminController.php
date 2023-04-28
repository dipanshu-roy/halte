<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\RecipientEmail;
use App\Models\NotificationsHistory;
use App\Models\Setting;
use App\Models\Country;
use App\Models\Image;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\PageContent;
use App\Models\ContactQuery;
use App\Models\DealerQuery;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\NewsMedia;
use App\Models\Blog;
use Auth;
use DB;
class AdminController extends Controller
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
                    return redirect('add-staff')->with('error','Password Not Matched');
                }
            }
            $update->user_id = Auth::user()->id;
            $update->save();
            return redirect('add-staff')->with('success','Updated successfully');
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
                    return redirect('add-staff')->with('error','Password Not Matched');
                }
                $newuser->user_id = Auth::user()->id;
                $newuser->save();
                return redirect('add-staff')->with('success','Saved successfully');
            }
        }
        return view('admin/manage_pages/add_staff',compact('result'));
    }
    public function UpdateStaff(Request $request,$id){
        $update = User::where('id',$id)->orderBy('id','DESC')->first();
        $result = User::where('type','!=',2)->orderBy('id','DESC')->get();
        return view('admin/manage_pages/add_staff',compact('result','update'));
    }
    public function DeleteStaff(Request $request,$id){
        User::where('id',$id)->delete();
        return redirect('add-staff')->with('error','Deleted successfully');
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
            $PageContent->updated_by = Auth::user()->id;
            $PageContent->save();
            return redirect('about-us')->with('success','Updated successfuly');
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
            $PageContent->updated_by = Auth::user()->id;
            $aboutus->save();
            return redirect('about-us')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/about_us',compact('PageContent'));
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
            $SupportPageContent->updated_by = Auth::user()->id;
            $SupportPageContent->save();
            return redirect('support')->with('success','Updated successfuly');
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
            $support->updated_by = Auth::user()->id;
            $support->save();
            return redirect('support')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/support',compact('SupportPageContent'));
    }
    
    public function ContactUs(Request $request){
        $ContactPageContent = PageContent::select('id','map_link','page_title','description','keyword')->where('page_name','contact-us')->first();
        if(!empty($ContactPageContent) && $request->id){
            $ContactPageContent->page_name = "contact-us";
            $ContactPageContent->map_link = $request->map_link;
            $ContactPageContent->page_title = $request->page_title;
            $ContactPageContent->description = $request->description;
            $ContactPageContent->keyword = $request->keyword;
            $ContactPageContent->updated_by = Auth::user()->id;
            $ContactPageContent->save();
            return redirect('contact-us')->with('success','Updated successfuly');
        }
        if(!empty($request->map_link)){
            $contactus = new PageContent();
            $contactus->page_name = "contact-us";
            $contactus->map_link = $request->map_link;
            $contactus->page_title = $request->page_title;
            $contactus->description = $request->description;
            $contactus->keyword = $request->keyword;
            $contactus->updated_by = Auth::user()->id;
            $contactus->save();
            return redirect('contact-us')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/contact_us',compact('ContactPageContent'));
    }
    public function BecomeDealer(Request $request){
        $BDealerPageContent = PageContent::select('id','text','page_title','description','keyword')->where('page_name','become-dealer')->first();
        if(!empty($BDealerPageContent) && $request->id){
            $BDealerPageContent->page_name = "become-dealer";
            $BDealerPageContent->text = $request->text;
            $BDealerPageContent->page_title = $request->page_title;
            $BDealerPageContent->description = $request->description;
            $BDealerPageContent->keyword = $request->keyword;
            $BDealerPageContent->updated_by = Auth::user()->id;
            $BDealerPageContent->save();
            return redirect('become-dealer')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $becomedealer = new PageContent();
            $becomedealer->page_name = "become-dealer";
            $becomedealer->text = $request->text;
            $becomedealer->page_title = $request->page_title;
            $becomedealer->description = $request->description;
            $becomedealer->keyword = $request->keyword;
            $becomedealer->updated_by = Auth::user()->id;
            $becomedealer->save();
            return redirect('become-dealer')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/become_dealer',compact('BDealerPageContent'));
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
            $SparAndServPageCont->updated_by = Auth::user()->id;
            $SparAndServPageCont->save();
            return redirect('spares-and-services')->with('success','Updated successfuly');
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
            $sparesandservices->updated_by = Auth::user()->id;
            $sparesandservices->save();
            return redirect('spares-and-services')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/spares_and_services',compact('SparAndServPageCont'));
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
            $demoInstaPageCont->updated_by = Auth::user()->id;
            $demoInstaPageCont->save();
            return redirect('demo-and-installation')->with('success','Updated successfuly');
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
            $demoandinstallation->updated_by = Auth::user()->id;
            $demoandinstallation->save();
            return redirect('demo-and-installation')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/demo_and_installation',compact('demoInstaPageCont'));
    }
    public function TermsAndCondition(Request $request){
        $TermsAndCondiPageCont = PageContent::select('id','text')->where('page_name','terms-and-condition')->first();
        if(!empty($TermsAndCondiPageCont) && $request->id){
            $TermsAndCondiPageCont->page_name = "terms-and-condition";
            $TermsAndCondiPageCont->text = $request->text;
            $TermsAndCondiPageCont->updated_by = Auth::user()->id;
            $TermsAndCondiPageCont->save();
            return redirect('terms-and-condition')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $termsandcondition = new PageContent();
            $termsandcondition->page_name = "terms-and-condition";
            $termsandcondition->text = $request->text;
            $termsandcondition->updated_by = Auth::user()->id;
            $termsandcondition->save();
            return redirect('terms-and-condition')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/terms_and_condition',compact('TermsAndCondiPageCont'));
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
            $offers->updated_by = Auth::user()->id;
            $offers->save();
            return redirect('offers')->with('success','Updated successfuly');
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
            $offers->updated_by = Auth::user()->id;
            $offers->save();
            return redirect('offers')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/offers',compact('resultOffers'));
    }
    public function UpdateOffer(Request $request,$id){
        $updateOffer = PageContent::where('id',$id)->orderBy('id','DESC')->first();
        $resultOffer = PageContent::orderBy('id','DESC')->get();
        return view('admin/manage_pages/offers',compact('resultOffer','updateOffer'));
    }
    public function DeleteOffer(Request $request,$id){
        PageContent::where('id',$id)->delete();
        return redirect('offers')->with('success','Deleted successfully');
    }
    public function Blogs(Request $request){
        $resultBlog = Blog::orderBy('id','DESC')->get();
        if(!empty($request->id)){
            $blog = Blog::where('id',$request->id)->first();
            $blog->title = $request->title;
            $blog->text = $request->text;
            $blog->updated_by = Auth::user()->id;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $blog->image = $imageName;
            }
            $blog->save();
            return redirect('blog')->with('success','Updated successfuly');
        }
        if(!empty($request->text)){
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->text = $request->text;
            $blog->updated_by = Auth::user()->id;
            if(!empty($request->image)){
                $extension = $request->image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $imageName = $request->image->move('public/pages/',$fileNameToStore);
                $blog->image = $imageName;
            }
            $blog->save();
            return redirect('blog')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/blog',compact('resultBlog'));
    }
    public function UpdateBlog(Request $request,$id){
        $updateBlog = Blog::where('id',$id)->orderBy('id','DESC')->first();
        $resultBlog = Blog::orderBy('id','DESC')->get();
        return view('admin/manage_pages/blog',compact('resultBlog','updateBlog'));
    }
    public function DeleteBlog(Request $request,$id){
        Blog::where('id',$id)->delete();
        return redirect('blog')->with('success','Deleted successfully');
    }
    public function ContactQuery(Request $request){
        if(!empty($request->start_date) && !empty($request->end_date)){
            $startDate = date_format(date_create($request->start_date),'Y-m-d');
            $endDate = date_format(date_create($request->end_date),'Y-m-d');
            $contactQuery = ContactQuery::whereBetween('created_at', [$startDate, $endDate])->orderBy('id','DESC')->get();
        }else{
            $contactQuery = ContactQuery::skip(0)->take(10)->orderBy('id','DESC')->get();
        }
        return view('admin/manage_pages/contact_query',compact('contactQuery'));
    }
    public function DealerQuery(Request $request){
        if(!empty($request->start_date) && !empty($request->end_date)){
            $startDate = date_format(date_create($request->start_date),'Y-m-d');
            $endDate = date_format(date_create($request->end_date),'Y-m-d');
            $dealerQuery = DealerQuery::whereBetween('created_at', [$startDate, $endDate])->orderBy('id','DESC')->get();
        }else{
            $dealerQuery = DealerQuery::skip(0)->take(10)->orderBy('id','DESC')->get();
        }
        return view('admin/manage_pages/dealer_query',compact('dealerQuery'));
    }
    public function FAQ(Request $request){
        $faqcategory = FaqCategory::select('id','category_name')->orderBy('id','DESC')->get();
        $resultFaq = DB::select("SELECT b.category_name,a.id,a.title,a.text,a.category_id FROM `faqs` AS a INNER JOIN faq_categories AS b ON a.category_id=b.id ORDER BY a.id DESC");
        if(!empty($request->id)){
            $faq = Faq::where('id',$request->id)->first();
            $faq->category_id = $request->category_id;
            $faq->title = $request->title;
            $faq->text = $request->text;
            $faq->save();
            return redirect('faq')->with('success','Update successfuly');
        }
        if(!empty($request->text)){
            $faq = new Faq();
            $faq->category_id = $request->category_id;
            $faq->title = $request->title;
            $faq->text = $request->text;
            $faq->save();
            return redirect('faq')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/faq',compact('resultFaq','faqcategory'));
    }
    public function UpdateFaq(Request $request,$id){
        $updateFaq = Faq::where('id',$id)->orderBy('id','DESC')->first();
        $faqcategory = FaqCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('admin/manage_pages/faq',compact('updateFaq','faqcategory'));
    }
    public function DeleteFaq(Request $request,$id){
        Faq::where('id',$id)->delete();
        return redirect('faq')->with('success','Deleted successfully');
    }
    public function NewsMedia(Request $request){
        $resultNewsMe = NewsMedia::orderBy('id','DESC')->get();
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
            return redirect('news-media')->with('success','Saved successfuly');
        }
        return view('admin/manage_pages/news_media',compact('resultNewsMe'));
    }
    public function HomePage(Request $request){
        return view('admin/manage_pages/home_page');
    }
}
