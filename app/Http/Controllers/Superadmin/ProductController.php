<?php
namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductSubCategory;
use App\Models\ProductCategory;
use App\Models\ProductFeature;
use App\Models\ProductFeatureDetail;
use App\Models\ProductSpecifications;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use Auth;
use DB;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * For Brand
     *
    */
    public function AddBrand(Request $request){
        $result = Brand::orderBy('id','DESC')->get();
        return view('superadmin/product/add_brand',compact('result'));
    }
    public function SaveBrand(Request $request){
        if(!empty($request->id)){
            $brand = Brand::where('id',$request->id)->orderBy('id','DESC')->first();
            $brand->barnd_name = $request->barnd_name;
            $brand->barnd_slug = Str::slug($request->barnd_name);
            $brand->whatsapp = $request->whatsapp;
            if($request->file('logo')){
                $extension = $request->logo->getClientOriginalExtension();
                $fileNameToStore = 'brands'.time().'.'.$extension;
                $assetUrl = $request->logo->move('public/brand/',$fileNameToStore);
                $brand->logo = 'brand/'.$fileNameToStore;
            }
            $brand->user_id = Auth::user()->id;
            $brand->save();
            return redirect('admin/product/add-brand')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $brand = new Brand();
                $brand->barnd_name = $request->barnd_name;
                $brand->barnd_slug = Str::slug($request->barnd_name);
                $brand->whatsapp = $request->whatsapp;
                if($request->file('logo')){
                    $extension = $request->logo->getClientOriginalExtension();
                    $fileNameToStore = 'brands'.time().'.'.$extension;
                    $assetUrl = $request->logo->move('public/brand/',$fileNameToStore);
                    $brand->logo = 'brand/'.$fileNameToStore;
                }
                $brand->user_id = Auth::user()->id;
                $brand->save();
                return redirect('admin/product/add-brand')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateBrand(Request $request,$id){
        $update = Brand::where('id',$id)->first();
        $result = Brand::orderBy('id','DESC')->get();
        return view('superadmin/product/add_brand',compact('result','update'));
    }
    public function DeleteBrand(Request $request,$id){
        Brand::where('id',$id)->delete();
        return redirect('admin/product/add-brand')->with('success','Deleted successfully');
    }
    /**
     * For Category
     *
    */
    public function AddProductCategory(Request $request){
        $result = ProductCategory::orderBy('id','DESC')->get();
        return view('superadmin/product/add_product_category',compact('result'));
    }
    public function SaveProductCategory(Request $request){
        $users = Auth::user();
        if(!empty($request->id)){
            $product = ProductCategory::where('id',$request->id)->orderBy('id','DESC')->first();
            $product->category_name = $request->category_name;
            $product->category_slug =  Str::slug($request->category_name);
            $product->user_id = $users->id;
            if($request->file('banner_image')){
                $extension = $request->banner_image->getClientOriginalExtension();
                $fileNameToStore = 'brands'.time().'.'.$extension;
                $assetUrl = $request->banner_image->move('public/category/',$fileNameToStore);
                $product->banner_image = 'category/'.$fileNameToStore;
            }
            $product->page_title = $request->page_title;
            $product->page_description = $request->page_description;
            $product->page_keywords = $request->page_keywords;
            $product->save();
            return redirect('admin/product/add-product-category')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $product = new ProductCategory();
                $product->category_name = $request->category_name;
                $product->category_slug =  Str::slug($request->category_name);
                $product->user_id = $users->id;
                if($request->file('banner_image')){
                    $extension = $request->banner_image->getClientOriginalExtension();
                    $fileNameToStore = 'brands'.time().'.'.$extension;
                    $assetUrl = $request->banner_image->move('public/category/',$fileNameToStore);
                    $product->banner_image = 'category/'.$fileNameToStore;
                }
                $product->page_title = $request->page_title;
                $product->page_description = $request->page_description;
                $product->page_keywords = $request->page_keywords;
                $product->save();
                return redirect('admin/product/add-product-category')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateProductCategory(Request $request,$id){
        $update = ProductCategory::where('id',$id)->first();
        $result = ProductCategory::orderBy('id','DESC')->get();
        return view('superadmin/product/add_product_category',compact('result','update'));
    }
    public function DeleteProductCategory(Request $request,$id){
        ProductCategory::where('id',$id)->delete();
        return redirect('admin/product/add-product-category')->with('success','Deleted successfully');
    }
     /**
     * For Subcategory
     *
    */
    public function AddProductSubCategory(Request $request){
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('superadmin/product/add_product_sub_category',compact('result','category'));
    }
    public function SaveProductSubCategory(Request $request){
        $users = Auth::user();
        if(!empty($request->id)){
            $product = ProductSubCategory::where('id',$request->id)->orderBy('id','DESC')->first();
            $product->category_id = $request->category_id;
            $product->subcategory_name = $request->subcategory_name;
            $product->subcategory_slug =  Str::slug($request->subcategory_name);
            $product->user_id = $users->id;
            if($request->file('banner_image')){
                $extension = $request->banner_image->getClientOriginalExtension();
                $fileNameToStore = 'brands'.time().'.'.$extension;
                $assetUrl = $request->banner_image->move('public/sub_category/',$fileNameToStore);
                $product->banner_image = 'sub_category/'.$fileNameToStore;
            }
            $product->page_title = $request->page_title;
            $product->page_description = $request->page_description;
            $product->page_keywords = $request->page_keywords;
            $product->save();
            return redirect('admin/product/add-product-sub-category')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $product = new ProductSubCategory();
                $product->category_id = $request->category_id;
                $product->subcategory_name = $request->subcategory_name;
                $product->subcategory_slug =  Str::slug($request->subcategory_name);
                $product->user_id = $users->id;
                if($request->file('banner_image')){
                    $extension = $request->banner_image->getClientOriginalExtension();
                    $fileNameToStore = 'brands'.time().'.'.$extension;
                    $assetUrl = $request->banner_image->move('public/sub_category/',$fileNameToStore);
                    $product->banner_image = 'sub_category/'.$fileNameToStore;
                }
                $product->page_title = $request->page_title;
                $product->page_description = $request->page_description;
                $product->page_keywords = $request->page_keywords;
                $product->save();
                return redirect('admin/product/add-product-sub-category')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateProductSubCategory(Request $request,$id){
        $update = ProductSubCategory::where('id',$id)->first();
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('superadmin/product/add_product_sub_category',compact('result','update','category'));
    }
    public function DeleteProductSubCategory(Request $request,$id){
        ProductSubCategory::where('id',$id)->delete();
        return redirect('admin/product/add-product-sub-category')->with('success','Deleted successfully');
    }
    /**
     * For Product
     *
    */
    public function AddProduct(Request $request){
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        $brand = Brand::select('id','barnd_name')->orderBy('id','DESC')->get();
        return view('superadmin/product/add_product',compact('result','category','brand'));
    }
    public function SaveProduct(Request $request){
        $users = Auth::user();
        if(!empty($request->id)){
            $product = Product::where('id',$request->id)->orderBy('id','DESC')->first();
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_slug =  Str::slug($request->product_name);
            $product->user_id = $users->id;
            if(!empty($request->file('main_image'))){
                $extension = $request->main_image->getClientOriginalExtension();
                $fileNameToStore = 'main'.time().'.'.$extension;
                $assetUrl = $request->main_image->move('public/product/',$fileNameToStore);
                $product->main_image = $assetUrl;
            }
            $subimages = null;
            if(!empty($request->file('sub_images'))){
                $sub_images = $request->file('sub_images');
                $count = count($sub_images);
                
                for($i=0;$i < $count;$i++){
                    if($sub_images[$i]){
                        $extension = $sub_images[$i]->getClientOriginalExtension();
                        $fileNameToStore = $i.time().'.'.$extension;
                        $subimages[] = $sub_images[$i]->move('public/product/',$fileNameToStore);
                    }
                }
                $product->sub_images = implode(',',$subimages);
            }
            $product->video = $request->video;
            $product->mrps = $request->mrps;
            $product->sale_price = $request->sale_price;
            $product->amazon_link = $request->amazon_link;
            $product->about_this_item = $request->about_this_item;
            $product->rating = $request->rating;
            $product->synonyms_other_name = $request->synonyms_other_name;
            $product->synonyms_other_name_slug = Str::slug($request->synonyms_other_name);
            $product->page_title = $request->page_title;
            $product->page_description = $request->page_description;
            $product->page_keywords = $request->page_keywords;
            $product->save();
            if(!empty($product->id)){
                $this->ProductFeatureFun($product->id,$request,$users);
                $this->ProductSpecification($product->id,$request,$users);
            }
            return redirect('admin/product/add-product')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $product = new Product();
                $product->category_id = $request->category_id;
                $product->subcategory_id = $request->subcategory_id;
                $product->brand_id = $request->brand_id;
                $product->product_name = $request->product_name;
                $product->product_slug =  Str::slug($request->product_name);
                $product->user_id = $users->id;
                if(!empty($request->file('main_image'))){
                    $extension = $request->main_image->getClientOriginalExtension();
                    $fileNameToStore = 'main'.time().'.'.$extension;
                    $assetUrl = $request->main_image->move('public/product/',$fileNameToStore);
                    $product->main_image = $assetUrl;
                }
                $subimages = null;
                if(!empty($request->file('sub_images'))){
                    $sub_images = $request->file('sub_images');
                    $count = count($sub_images);
                    
                    for($i=0;$i < $count;$i++){
                        if($sub_images[$i]){
                            $extension = $sub_images[$i]->getClientOriginalExtension();
                            $fileNameToStore = $i.time().'.'.$extension;
                            $subimages[] = $sub_images[$i]->move('public/product/',$fileNameToStore);
                        }
                    }
                    $product->sub_images = implode(',',$subimages);
                }
                $product->video = $request->video;
                $product->mrps = $request->mrps;
                $product->sale_price = $request->sale_price;
                $product->amazon_link = $request->amazon_link;
                $product->about_this_item = $request->about_this_item;
                $product->rating = $request->rating;
                $product->synonyms_other_name = $request->synonyms_other_name;
                $product->synonyms_other_name_slug = Str::slug($request->synonyms_other_name);
                $product->page_title = $request->page_title;
                $product->page_description = $request->page_description;
                $product->page_keywords = $request->page_keywords;
                $product->save();
                if(!empty($product->id)){
                    $this->ProductFeatureFun($product->id,$request,$users);
                    $this->ProductSpecification($product->id,$request,$users);
                }
                return redirect('admin/product/add-product')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateProduct(Request $request,$id){
        $update = Product::where('id',$id)->first();
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        $brand = Brand::select('id','barnd_name')->orderBy('id','DESC')->get();
        $subcategory = ProductSubCategory::select('id','subcategory_name')->where('category_id',$update->category_id)->orderBy('id','DESC')->get();
        $update_feature = ProductFeature::select('id','feature_main_image','description')->where('product_id',$id)->first();
        $update_feature_details = ProductFeatureDetail::select('id','feature_title','feature_image','feature_details')->where('feature_id',$update_feature->id)->get();
        $update_specification = ProductSpecifications::where('product_id',$id)->first();
        return view('superadmin/product/add_product',compact('result','update','category','subcategory','brand','update_feature','update_feature_details','update_specification'));
    }
    public function DeleteProduct(Request $request,$id){
        Product::where('id',$id)->delete();
        $get_feature = ProductFeature::select('id')->where('product_id',$id)->first();
        ProductFeature::where('product_id',$id)->delete();
        ProductFeatureDetail::where('feature_id',$get_feature->id)->delete();
        ProductSpecifications::where('product_id',$id)->delete();
        return redirect('admin/product/view-product')->with('success','Deleted successfully');
    }
    public function ProductFeatureFun($id,$request,$users){
        $product_feature = ProductFeature::where('product_id',$id)->first();
        if(!empty($product_feature)){
            $product_feature->user_id = $users->id;
            if(!empty($request->file('feature_main_image'))){
                $extension = $request->feature_main_image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $assetUrl = $request->feature_main_image->move('public/product/',$fileNameToStore);
                $product_feature->feature_main_image = $assetUrl;
            }
            $product_feature->description = $request->description;
            $product_feature->save();
        }else{
            $product_feature = new ProductFeature();
            $product_feature->user_id = $users->id;
            $product_feature->product_id = $id;
            if(!empty($request->file('feature_main_image'))){
                $extension = $request->feature_main_image->getClientOriginalExtension();
                $fileNameToStore = time().'.'.$extension;
                $assetUrl = $request->feature_main_image->move('public/product/',$fileNameToStore);
                $product_feature->feature_main_image = $assetUrl;
            }
            $product_feature->description = $request->description;
            $product_feature->save();
        }
        $product_feature_detail = ProductFeatureDetail::where('feature_id',$product_feature->id)->first();
        if(!empty($product_feature_detail)){
            for($i=0; $i < count($request->feature_title); $i++){
                $product_feature_detail->feature_title = $request->feature_title[$i];
                if(!empty($request->file('feature_image')[$i])){
                    $extension = $request->feature_image[$i]->getClientOriginalExtension();
                    $fileNameToStore = $i.time().'.'.$extension;
                    $product_feature_detail->feature_image = $request->feature_image[$i]->move('public/product/',$fileNameToStore);
                }
                $product_feature_detail->feature_details = $request->feature_details[$i];
                $product_feature_detail->save();
            }
        }else{
            for($i=0; $i < count($request->feature_title); $i++){
                $product_feature_detail = new ProductFeatureDetail();
                $product_feature_detail->feature_id = $product_feature->id;
                $product_feature_detail->feature_title = $request->feature_title[$i];
                if(!empty($request->file('feature_image')[$i])){
                    $extension = $request->feature_image[$i]->getClientOriginalExtension();
                    $fileNameToStore = $i.time().'.'.$extension;
                    $product_feature_detail->feature_image = $request->feature_image[$i]->move('public/product/',$fileNameToStore);
                }
                $product_feature_detail->feature_details = $request->feature_details[$i];
                $product_feature_detail->save();
            }
        }
    }
    public function ProductSpecification($pro_id,$request,$users){
        $productSpecifications = ProductSpecifications::where('product_id',$pro_id)->where('user_id',$users->id)->first();
        if(!empty($productSpecifications)){
            $productSpecifications->sku = $request->sku;
            $productSpecifications->material = $request->material;
            $productSpecifications->style = $request->style;
            $productSpecifications->cutting_width = $request->cutting_width;
            $productSpecifications->country_of_origin = $request->country_of_origin;
            $productSpecifications->specification_title = $request->specification_title;
            $productSpecifications->power_source = $request->power_source;
            $productSpecifications->colour = $request->colour;
            $productSpecifications->item_weight = $request->item_weight;
            $productSpecifications->number_of_positions = $request->number_of_positions;
            $productSpecifications->product_dimensions = $request->product_dimensions;
            $productSpecifications->specification_value = $request->specification_value;
            $productSpecifications->additional_information = $request->additional_information;
        }else{
            $productSpecifications = new ProductSpecifications();
            $productSpecifications->user_id = $users->id;
            $productSpecifications->product_id = $pro_id;
            $productSpecifications->sku = $request->sku;
            $productSpecifications->material = $request->material;
            $productSpecifications->style = $request->style;
            $productSpecifications->cutting_width = $request->cutting_width;
            $productSpecifications->country_of_origin = $request->country_of_origin;
            $productSpecifications->specification_title = $request->specification_title;
            $productSpecifications->power_source = $request->power_source;
            $productSpecifications->colour = $request->colour;
            $productSpecifications->item_weight = $request->item_weight;
            $productSpecifications->number_of_positions = $request->number_of_positions;
            $productSpecifications->product_dimensions = $request->product_dimensions;
            $productSpecifications->specification_value = $request->specification_value;
            $productSpecifications->additional_information = $request->additional_information;
        }
        $productSpecifications->save();
    }
    public function ViewProduct(Request $request){
        if(!empty($request->all())){
            $where = 'WHERE a.status=1 ';
            if(!empty($request->sku)){
                $where .='AND e.sku='.$request->sku.' ';
            }
            if(!empty($request->name)){
                $where .='AND a.product_name like "%'.$request->name.'%" ';
            }
            if(!empty($request->barnd_name)){
                $where .='AND a.brand_id='.$request->barnd_name.' ';
            }
            if(!empty($request->category_name)){
                $where .='AND a.category_id='.$request->category_name.' ';
            }
            $viewProduct = DB::select("SELECT a.id,a.product_name,a.main_image,a.mrps,a.sale_price,b.barnd_name,c.category_name,d.subcategory_name,e.sku FROM `products` as a LEFT JOIN brands as b on a.brand_id=b.id LEFT JOIN product_categories as c on a.category_id=c.id LEFT JOIN product_sub_categories as d on a.subcategory_id=d.id LEFT JOIN product_specifications as e on a.id=e.product_id $where");
        }else{
            $viewProduct = DB::select("SELECT a.id,a.product_name,a.main_image,a.mrps,a.sale_price,b.barnd_name,c.category_name,d.subcategory_name,e.sku FROM `products` as a LEFT JOIN brands as b on a.brand_id=b.id LEFT JOIN product_categories as c on a.category_id=c.id LEFT JOIN product_sub_categories as d on a.subcategory_id=d.id LEFT JOIN product_specifications as e on a.id=e.product_id lIMIT 50");
        }
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        $brand = Brand::select('id','barnd_name')->orderBy('id','DESC')->get();
        return view('superadmin/product/view_product',compact('viewProduct','category','brand'));
    }
}
