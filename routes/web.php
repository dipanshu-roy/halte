<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\TemplateController;
use App\Models\Organisation;

Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   return "Cleared!";
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
/* Super admin route   */
Route::middleware(['auth','user-access:admin'])->group(function () {
    Route::any('admin/add-staff', [SuperadminController::class, 'AddStaff'])->name('add.staff');
    Route::get('admin/update-staff/{id}', [SuperadminController::class, 'UpdateStaff']);
    Route::get('admin/delete-staff/{id}', [SuperadminController::class, 'DeleteStaff']);

    /*  Brnd Item */
    Route::get('admin/product/add-brand', [App\Http\Controllers\Superadmin\ProductController::class, 'AddBrand']);
    Route::post('admin/product/save-brand', [App\Http\Controllers\Superadmin\ProductController::class, 'SaveBrand']);
    Route::get('admin/product/update-brand/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'UpdateBrand']);
    Route::get('admin/product/delete-brand/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'DeleteBrand']);
    /*  Product Category */
    Route::get('admin/product/add-product-category', [App\Http\Controllers\Superadmin\ProductController::class, 'AddProductCategory']);
    Route::post('admin/product/save-product-category', [App\Http\Controllers\Superadmin\ProductController::class, 'SaveProductCategory']);
    Route::get('admin/product/update-product-category/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'UpdateProductCategory']);
    Route::get('admin/product/delete-product-category/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'DeleteProductCategory']);
    /*  Product SubCategory */
    Route::get('admin/product/add-product-sub-category', [App\Http\Controllers\Superadmin\ProductController::class, 'AddProductSubCategory']);
    Route::post('admin/product/save-product-sub-category', [App\Http\Controllers\Superadmin\ProductController::class, 'SaveProductSubCategory']);
    Route::get('admin/product/update-product-sub-category/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'UpdateProductSubCategory']);
    Route::get('admin/product/delete-product-sub-category/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'DeleteProductSubCategory']);
    /*  Product product */
    Route::get('admin/product/add-product', [App\Http\Controllers\Superadmin\ProductController::class, 'AddProduct']);
    Route::post('admin/product/save-product', [App\Http\Controllers\Superadmin\ProductController::class, 'SaveProduct']);
    Route::get('admin/product/update-product/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'UpdateProduct']);
    Route::get('admin/product/delete-product/{id}', [App\Http\Controllers\Superadmin\ProductController::class, 'DeleteProduct']);
    /* Product View */
    Route::get('admin/product/view-product', [App\Http\Controllers\Superadmin\ProductController::class, 'ViewProduct']);
    /*  Manage Pages */                                
    Route::any('admin/about-us', [SuperadminController::class, 'AboutUs']);
    Route::any('admin/support', [SuperadminController::class, 'Support']);
    Route::any('admin/contact-us', [SuperadminController::class, 'ContactUs']);
    Route::any('admin/become-dealer', [SuperadminController::class, 'BecomeDealer']);
    Route::any('admin/spares-and-services', [SuperadminController::class, 'SparesAndServices']);
    Route::any('admin/demo-and-installation', [SuperadminController::class, 'DemoAndInstallation']);
    Route::any('admin/terms-and-condition', [SuperadminController::class, 'TermsAndCondition']);
    Route::any('admin/offers', [SuperadminController::class, 'Offers']);
    Route::any('admin/update-offer/{id}', [SuperadminController::class, 'UpdateOffer']);
    Route::any('admin/delete-offer/{id}', [SuperadminController::class, 'DeleteOffer']);
    Route::any('admin/blog', [SuperadminController::class, 'Blogs']);
    Route::any('admin/update-blog/{id}', [SuperadminController::class, 'UpdateBlog']);
    Route::any('admin/delete-blog/{id}', [SuperadminController::class, 'DeleteBlog']);
    Route::any('admin/contact-query', [SuperadminController::class, 'ContactQuery']);
    Route::any('admin/dealer-query', [SuperadminController::class, 'DealerQuery']);
    Route::any('admin/faq', [SuperadminController::class, 'FAQ']);
    Route::any('admin/news-media', [SuperadminController::class, 'NewsMedia']);
    Route::any('admin/home-page', [SuperadminController::class, 'HomePage']);


});

/* Staff route   */
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    /*  Brnd Item */
    Route::get('product/add-brand', [App\Http\Controllers\Admin\ProductController::class, 'AddBrand']);
    Route::post('product/save-brand', [App\Http\Controllers\Admin\ProductController::class, 'SaveBrand']);
    Route::get('product/update-brand/{id}', [App\Http\Controllers\Admin\ProductController::class, 'UpdateBrand']);
    Route::get('product/delete-brand/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteBrand']);
    /*  Product Category */
    Route::get('product/add-product-category', [App\Http\Controllers\Admin\ProductController::class, 'AddProductCategory']);
    Route::post('product/save-product-category', [App\Http\Controllers\Admin\ProductController::class, 'SaveProductCategory']);
    Route::get('product/update-product-category/{id}', [App\Http\Controllers\Admin\ProductController::class, 'UpdateProductCategory']);
    Route::get('product/delete-product-category/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteProductCategory']);
    /*  Product SubCategory */
    Route::get('product/add-product-sub-category', [App\Http\Controllers\Admin\ProductController::class, 'AddProductSubCategory']);
    Route::post('product/save-product-sub-category', [App\Http\Controllers\Admin\ProductController::class, 'SaveProductSubCategory']);
    Route::get('product/update-product-sub-category/{id}', [App\Http\Controllers\Admin\ProductController::class, 'UpdateProductSubCategory']);
    Route::get('product/delete-product-sub-category/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteProductSubCategory']);
    /*  Manage Pages */
    Route::any('add-staff', [App\Http\Controllers\Admin\AdminController::class, 'AddStaff'])->name('add.staff');
    Route::get('update-staff/{id}', [App\Http\Controllers\Admin\AdminController::class, 'UpdateStaff']);
    Route::get('delete-staff/{id}', [App\Http\Controllers\Admin\AdminController::class, 'DeleteStaff']);
    Route::any('about-us', [App\Http\Controllers\Admin\AdminController::class, 'AboutUs']);
    Route::any('support', [App\Http\Controllers\Admin\AdminController::class, 'Support']);
    Route::any('contact-us', [App\Http\Controllers\Admin\AdminController::class, 'ContactUs']);
    Route::any('become-dealer', [App\Http\Controllers\Admin\AdminController::class, 'BecomeDealer']);
    Route::any('spares-and-services', [App\Http\Controllers\Admin\AdminController::class, 'SparesAndServices']);
    Route::any('demo-and-installation', [App\Http\Controllers\Admin\AdminController::class, 'DemoAndInstallation']);
    Route::any('terms-and-condition', [App\Http\Controllers\Admin\AdminController::class, 'TermsAndCondition']);
    Route::any('offers', [App\Http\Controllers\Admin\AdminController::class, 'Offers']);
    Route::any('update-offer/{id}', [App\Http\Controllers\Admin\AdminController::class, 'UpdateOffer']);
    Route::any('delete-offer/{id}', [App\Http\Controllers\Admin\AdminController::class, 'DeleteOffer']);
    Route::any('blog', [App\Http\Controllers\Admin\AdminController::class, 'Blogs']);
    Route::any('update-blog/{id}', [App\Http\Controllers\Admin\AdminController::class, 'UpdateBlog']);
    Route::any('delete-blog/{id}', [App\Http\Controllers\Admin\AdminController::class, 'DeleteBlog']);
    Route::any('news-media', [App\Http\Controllers\Admin\AdminController::class, 'NewsMedia']);
    Route::any('home-page', [App\Http\Controllers\Admin\AdminController::class, 'HomePage']);
    Route::any('contact-query', [App\Http\Controllers\Admin\AdminController::class, 'ContactQuery']);
    Route::any('dealer-query', [App\Http\Controllers\Admin\AdminController::class, 'DealerQuery']);
    Route::any('faq', [App\Http\Controllers\Admin\AdminController::class, 'FAQ']);
});


/* User route   */
Route::middleware(['auth', 'user-access:user'])->group(function () {
    
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WebController::class, 'index']);
Route::get('/brand/{slug}', [App\Http\Controllers\WebController::class, 'Product']);
Route::get('/ct/{cat}/{subcat}', [App\Http\Controllers\WebController::class, 'SubProduct']);
Route::get('/contact-us', [App\Http\Controllers\WebController::class, 'ContactUs']);
Route::post('/send-enquiry', [App\Http\Controllers\WebController::class, 'SendEnquiry']);