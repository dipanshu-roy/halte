<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductSubCategory;
use App\Models\ProductCategory;
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
        $users = Auth::user();
        $result = Brand::orderBy('id','DESC')->where('user_id',$users->id)->get();
        return view('admin/product/add_brand',compact('result'));
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
                $assetUrl = $request->logo->move('public/template/',$fileNameToStore);
                $brand->logo = $assetUrl;
            }
            $brand->user_id = Auth::user()->id;
            $brand->save();
            return redirect('product/add-brand')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $brand = new Brand();
                $brand->barnd_name = $request->barnd_name;
                $brand->barnd_slug = Str::slug($request->barnd_name);
                $brand->whatsapp = $request->whatsapp;
                if($request->file('logo')){
                    $extension = $request->logo->getClientOriginalExtension();
                    $fileNameToStore = 'brands'.time().'.'.$extension;
                    $assetUrl = $request->logo->move('public/template/',$fileNameToStore);
                    $brand->logo = $assetUrl;
                }
                $brand->user_id = Auth::user()->id;
                $brand->save();
                return redirect('product/add-brand')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateBrand(Request $request,$id){
        $users = Auth::user();
        $update = Brand::where('id',$id)->where('user_id',$users->id)->first();
        $result = Brand::orderBy('id','DESC')->where('user_id',$users->id)->get();
        return view('admin/product/add_brand',compact('result','update'));
    }
    public function DeleteBrand(Request $request,$id){
        Brand::where('id',$id)->delete();
        return redirect('product/add-brand')->with('success','Deleted successfully');
    }
    /**
     * For Category
     *
    */
    public function AddProductCategory(Request $request){
        $result = ProductCategory::orderBy('id','DESC')->get();
        return view('admin/product/add_product_category',compact('result'));
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
                $assetUrl = $request->banner_image->move('public/template/',$fileNameToStore);
                $product->banner_image = $assetUrl;
            }
            $product->page_title = $request->page_title;
            $product->page_description = $request->page_description;
            $product->page_keywords = $request->page_keywords;
            $product->save();
            return redirect('product/add-product-category')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $product = new ProductCategory();
                $product->category_name = $request->category_name;
                $product->category_slug =  Str::slug($request->category_name);
                $product->user_id = $users->id;
                if($request->file('banner_image')){
                    $extension = $request->banner_image->getClientOriginalExtension();
                    $fileNameToStore = 'brands'.time().'.'.$extension;
                    $assetUrl = $request->banner_image->move('public/template/',$fileNameToStore);
                    $product->banner_image = $assetUrl;
                }
                $product->page_title = $request->page_title;
                $product->page_description = $request->page_description;
                $product->page_keywords = $request->page_keywords;
                $product->save();
                return redirect('product/add-product-category')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateProductCategory(Request $request,$id){
        $update = ProductCategory::where('id',$id)->first();
        $result = ProductCategory::orderBy('id','DESC')->get();
        return view('admin/product/add_product_category',compact('result','update'));
    }
    public function DeleteProductCategory(Request $request,$id){
        ProductCategory::where('id',$id)->delete();
        return redirect('product/add-product-category')->with('success','Deleted successfully');
    }
     /**
     * For Subcategory
     *
    */
    public function AddProductSubCategory(Request $request){
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('admin/product/add_product_sub_category',compact('result','category'));
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
                $assetUrl = $request->banner_image->move('public/template/',$fileNameToStore);
                $product->banner_image = $assetUrl;
            }
            $product->page_title = $request->page_title;
            $product->page_description = $request->page_description;
            $product->page_keywords = $request->page_keywords;
            $product->save();
            return redirect('product/add-product-sub-category')->with('success','Updated successfully');
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
                    $assetUrl = $request->banner_image->move('public/template/',$fileNameToStore);
                    $product->banner_image = $assetUrl;
                }
                $product->page_title = $request->page_title;
                $product->page_description = $request->page_description;
                $product->page_keywords = $request->page_keywords;
                $product->save();
                return redirect('product/add-product-sub-category')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateProductSubCategory(Request $request,$id){
        $update = ProductSubCategory::where('id',$id)->first();
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('admin/product/add_product_sub_category',compact('result','update','category'));
    }
    public function DeleteProductSubCategory(Request $request,$id){
        ProductSubCategory::where('id',$id)->delete();
        return redirect('product/add-product-sub-category')->with('success','Deleted successfully');
    }
     /**
     * For Product
     *
    */
    public function AddProduct(Request $request){
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('admin/product/add_product',compact('result','category'));
    }
    public function SaveProduct(Request $request){
        $users = Auth::user();
        if(!empty($request->id)){
            $product = Product::where('id',$request->id)->orderBy('id','DESC')->first();
            $product->category_id = $request->category_id;
            $product->subcategory_name = $request->subcategory_name;
            $product->subcategory_slug =  Str::slug($request->subcategory_name);
            $product->user_id = $users->id;
            if($request->file('banner_image')){
                $extension = $request->banner_image->getClientOriginalExtension();
                $fileNameToStore = 'brands'.time().'.'.$extension;
                $assetUrl = $request->banner_image->move('public/template/',$fileNameToStore);
                $product->banner_image = $assetUrl;
            }
            $product->page_title = $request->page_title;
            $product->page_description = $request->page_description;
            $product->page_keywords = $request->page_keywords;
            $product->save();
            return redirect('product/add-product-sub-category')->with('success','Updated successfully');
        }else{
            if(!empty($request->all())){
                $product = new Product();
                $product->category_id = $request->category_id;
                $product->subcategory_name = $request->subcategory_name;
                $product->subcategory_slug =  Str::slug($request->subcategory_name);
                $product->user_id = $users->id;
                if($request->file('banner_image')){
                    $extension = $request->banner_image->getClientOriginalExtension();
                    $fileNameToStore = 'brands'.time().'.'.$extension;
                    $assetUrl = $request->banner_image->move('public/template/',$fileNameToStore);
                    $product->banner_image = $assetUrl;
                }
                $product->page_title = $request->page_title;
                $product->page_description = $request->page_description;
                $product->page_keywords = $request->page_keywords;
                $product->save();
                return redirect('product/add-product-sub-category')->with('success','Saved successfully');
            }
        }
    }
    public function UpdateProduct(Request $request,$id){
        $update = Product::where('id',$id)->first();
        $result = DB::select("SELECT a.id,b.category_name,a.subcategory_name,a.banner_image,a.page_title FROM `product_sub_categories` as a INNER JOIN product_categories as b on a.category_id=b.id ORDER BY a.id DESC");
        $category = ProductCategory::select('id','category_name')->orderBy('id','DESC')->get();
        return view('admin/product/add_product_sub_category',compact('result','update','category'));
    }
    public function DeleteProduct(Request $request,$id){
        Product::where('id',$id)->delete();
        return redirect('product/add-product-sub-category')->with('success','Deleted successfully');
    }
}
