<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorProductController;
use Illuminate\Support\Facades\Route;



// all public route route here
Route::get('/', function() {
    return view('index');
})->name('/');






// all supper admin route here
Route::middleware(['auth','role:1','verified'])->group(function(){

    Route::get('/supper/admin/dashboard', [SuperadminController::class, 'index'])->name('supper.admin.dashboard');
});



// all admin route here
Route::middleware(['auth','role:2','verified'])->group(function(){

    // all admin profile related route
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
        Route::get('/admin/logout', 'adminLogout')->name('admin.logout');
        Route::get('/admin/profile', 'adminProfile')->name('admin.profile');
        Route::get('/admin/settings', 'adminSettings')->name('admin.settings');
        Route::post('/admin/profile/update', 'adminProfileUpdate')->name('admin.profile.update');
        Route::post('/admin/profile/pic/update', 'adminProfilePicUpdate')->name('admin.profile.pic.update');
        Route::post('admin/social/link/update', 'adminSocialLinkUpdate')->name('admin.social.link.update');
        Route::post('/admin/password/update', 'adminPasswordUpdate')->name('admin.password.update');
    });


    // all vendor control admin route here
    Route::controller(AdminController::class)->group(function(){
        Route::get('admin/all/active/vendor', 'allActiveVendor')->name('admin.all.active.vendor');
        Route::get('admin/all/requested/vendor', 'allRequestedVendor')->name('admin.all.requested.vendor');
        Route::get('/admin/vendor/edit/{slug}', 'adminVendorEdit')->name('admin.vendor.edit');
        Route::post('/admin/active/requested/vendor/{slug}', 'activeRequestedVendor')->name('admin.active.requested.vendor');

        Route::get('/admin/requested/vendor/delete/{slug}', 'adminRequestedVendorDelete')->name('admin.requested.vendor.delete');

    });


    // all brand related url here
    Route::controller(BrandController::class)->group(function(){
        Route::get('/admin/all/brand', 'index')->name('admin.all.brand');
        Route::get('/admin/add/brand', 'create')->name('admin.add.brand');
        Route::post('/admin/brand/store', 'store')->name('admin.brand.store');
        Route::get('/admin/brand/edit/{slug}', 'edit')->name('admin.brand.edit');
        Route::post('/admin/brand/update', 'update')->name('admin.brand.update');
        Route::get('/admin/brand/delete/{slug}', 'softDelete')->name('admin.brand.delete');
        Route::get('/admin/recycle/brand', 'recycle')->name('admin.recycle.brand');
        Route::get('/admin/restore/brand/{slug}', 'restore')->name('admin.brand.restore');
        Route::get('/admin/brand/permanentlyDelete/{slug}', 'permanentlyDelete')->name('admin.brand.permanentlyDelete');
    });


    // all category related url here
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/all/category', 'index')->name('admin.all.category');
        Route::get('/admin/add/category', 'create')->name('admin.add.category');
        Route::post('/admin/category/store', 'store')->name('admin.category.store');
        Route::get('/admin/category/edit/{slug}', 'edit')->name('admin.category.edit');
        Route::post('/admin/category/update', 'update')->name('admin.category.update');
        Route::get('/admin/category/delete/{slug}', 'softDelete')->name('admin.category.delete');
        Route::get('/admin/recycle/category', 'recycle')->name('admin.recycle.category');
        Route::get('/admin/restore/category/{slug}', 'restore')->name('admin.category.restore');
        Route::get('/admin/category/permanentlyDelete/{slug}', 'permanentlyDelete')->name('admin.category.permanentlyDelete');
    });


    // all sub/category related url here
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/admin/all/sub/category', 'index')->name('admin.all.sub.category');
        Route::get('/admin/add/sub/category', 'create')->name('admin.add.sub.category');
        Route::post('/admin/sub/category/store', 'store')->name('admin.sub.category.store');
        Route::get('/admin/sub/category/edit/{slug}', 'edit')->name('admin.sub.category.edit');
        Route::post('/admin/sub/category/update', 'update')->name('admin.sub.category.update');
        Route::get('/admin/sub/category/delete/{slug}', 'softDelete')->name('admin.sub.category.delete');
        Route::get('/admin/recycle/sub/category', 'recycle')->name('admin.recycle.sub.category');
        Route::get('/admin/restore/sub/category/{slug}', 'restore')->name('admin.sub.category.restore');
        Route::get('/admin/sub/category/permanentlyDelete/{slug}', 'permanentlyDelete')->name('admin.sub.category.permanentlyDelete');
    });

    // all Admin product related url here
    Route::controller(ProductsController::class)->group(function(){
        Route::get('/admin/all/product', 'adminAllProduct')->name('admin.all.product');

        Route::get('/admin/find/subcategory/{id}', 'adminFindSubcategory')->name('admin.find.subcategory');
        Route::get('/admin/add/product', 'adminAddProduct')->name('admin.add.product');
        Route::post('/admin/store/product', 'adminStoreProduct')->name('admin.store.product');
        Route::get('/admin/product/edit/{slug}', 'adminEditProduct')->name('admin.product.edit');
        Route::post('/admin/update/product', 'adminUpdateProduct')->name('admin.update.product');
        Route::post('/admin/product/single/image/update', 'adminProductSingleImageUpdate')->name('admin.product.single.image.update');

        Route::get('/admin/inactive/product/{slug}', 'adminInactiveProduct')->name('admin.inactive.product');

        Route::get('/admin/active/product/{slug}', 'adminActiveProduct')->name('admin.active.product');

        Route::get('/admin/product/delete/{slug}', 'adminDeleteProduct')->name('admin.product.delete');
        Route::get('/admin/recycle/product', 'recycle')->name('admin.recycle.product');
        Route::get('/admin/product/restore/{slug}', 'restore')->name('admin.product.restore');
        Route::get('/admin/product/permanentlyDelete/{slug}', 'permanentlyDelete')->name('admin.product.permanentlyDelete');
    });

});

// admin login route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('login/store', [AuthenticatedSessionController::class, 'store'])->name('loginStore');


// all vendor route here
Route::middleware(['auth','role:3','verified'])->group(function(){

    // all vendor profile related url here
    Route::controller(VendorController::class)->group(function(){
        Route::get('/vendor/dashboard', 'index')->name('vendor.dashboard');
        Route::get('/vendor/logout', 'vendorLogout')->name('vendor.logout');
        Route::get('/vendor/profile', 'vendorProfile')->name('vendor.profile');
        Route::post('/vendor/profile/update', 'vendorProfileUpdate')->name('vendor.profile.update');
        Route::get('/vendor/settings', 'vendorSettings')->name('vendor.settings');
        Route::post('/vendor/profile/pic/update', 'vendorProfilePicUpdate')->name('vendor.profile.pic.update');
        Route::post('/vendor/social/link/update', 'vendorSocialLinkUpdate')->name('vendor.social.link.update');
        Route::post('/vendor/password/update', 'vendorPasswordUpdate')->name('vendor.password.update');
    });

    // all Vendor product related url here
    Route::controller(VendorProductController::class)->group(function(){
        Route::get('/vendor/all/product', 'vendorAllProduct')->name('vendor.all.product');
        Route::get('/vendor/find/subcategory/{id}', 'vendorFindSubcategory')->name('vendor.find.subcategory');
        Route::get('/vendor/add/product', 'vendorAddProduct')->name('vendor.add.product');
        Route::post('/vendor/store/product', 'vendorStoreProduct')->name('vendor.store.product');
        Route::get('/vendor/product/edit/{slug}', 'vendorEditProduct')->name('vendor.product.edit');
        Route::post('/vendor/update/product', 'vendorUpdateProduct')->name('vendor.update.product');
        Route::post('/vendor/product/single/image/update', 'vendorProductSingleImageUpdate')->name('vendor.product.single.image.update');

        Route::get('/vendor/inactive/product/{slug}', 'vendorInactiveProduct')->name('vendor.inactive.product');

        Route::get('/vendor/active/product/{slug}', 'vendorActiveProduct')->name('vendor.active.product');

        Route::get('/vendor/product/delete/{slug}', 'vendorDeleteProduct')->name('vendor.product.delete');
        Route::get('/vendor/recycle/product', 'recycle')->name('vendor.recycle.product');
        Route::get('/vendor/product/restore/{slug}', 'restore')->name('vendor.product.restore');
        Route::get('/vendor/product/permanentlyDelete/{slug}', 'permanentlyDelete')->name('vendor.product.permanentlyDelete');
    });


});

// vendor login register route
Route::get('/vendor/apply/{slug}', [VendorController::class, 'vendorApply'])->name('vendor.apply');
Route::post('/vendor/apply/submit', [VendorController::class, 'vendorApplySubmit'])->name('vendor.apply.submit');
Route::get('/vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.login');
Route::post('login/store', [AuthenticatedSessionController::class, 'store'])->name('loginStore');



// // all user route
Route::middleware(['auth','role:4','verified'])->group(function(){

    Route::controller(UserController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('logout', 'logout')->name('logout');
        Route::post('update/profile', 'update')->name('update.profile');
        Route::post('password/update', 'passwordUpdate')->name('password.update');
    });
});

// for register page
Route::get('register', [UserController::class, 'create'])->name('register');
// for register post
Route::post('register/post', [UserController::class, 'store'])->name('register.post');

// for log in page
Route::get('login', [UserController::class, 'login_page'])->name('login');
// for log in request
Route::post('login/store', [AuthenticatedSessionController::class, 'store'])->name('loginStore');


// all guest route here
Route::controller(FrontendController::class)->group(function(){
    Route::get('/find/subcategory/{id}', 'findSubcategory')->name('find.subcategory');
    Route::get('/product/details/{slug}', 'productDetails')->name('product.details');
    Route::get('/vendor/details/{slug}', 'vendorDetails')->name('vendor.details');
    Route::get('/vendor/details/{slug}', 'vendorDetails')->name('vendor.details');
    Route::get('/categorywise/product/{slug}', 'categorywiseProduct')->name('categorywise.product');
    Route::get('/sub/categorywise/product/{slug}', 'subCategorywiseProduct')->name('sub.categorywise.product');


    // product quick view
    Route::get('/product/quick/view/{id}', 'productQuickView');

});

// all Cart route here
Route::controller(CartController::class)->group(function(){
    Route::post('/product/add/to/cart/{product_id}', 'productAddToCart');

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// require __DIR__.'/auth.php';

