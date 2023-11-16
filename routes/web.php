<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;


Route::get('/', function () {
    return view('frontend.home.home');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::post('/dashboard/profile/update', [UserController::class, 'update'])->name('user.profile.update');
    Route::post('/dashboard/change/password', [UserController::class, 'updatePassword'])->name('user.change.password');
});

//admin with auth
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'admin_dashboard')->name('admin.dashboard');
        Route::get('/admin/logout', 'adminDestroy')->name('admin.logout');
        Route::get('/admin/profile', 'adminProfile')->name('admin.profile');
        Route::post('/admin/profile/update', 'adminProfileUpdate')->name('admin.profile.update');
        Route::post('/admin/password/update', 'adminPasswordUpdate')->name('admin.password.update');
        Route::get('/admin/change/password', 'adminChangePassword')->name('admin.change.password');
    });

    Route::controller(BrandController::class)->group(function () {
        Route::get('/admin/dashboard/brand', 'index')->name('all-brand');
        Route::get('/admin/dashboard/brand/add', 'add')->name('add-brand');
        Route::get('/admin/dashboard/brand/edit/{slug}', 'edit')->name('edit-brand');
        Route::post('/admin/dashboard/brand/submit', 'insert')->name('insert-brand');
        Route::post('/admin/dashboard/brand/update', 'update')->name('update-brand');
        Route::get('/admin/dashboard/brand/softDelete/{id}', 'softDelete')->name('softDelete-brand');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/dashboard/category', 'index')->name('all-category');
        Route::get('/admin/dashboard/category/add', 'add')->name('add-category');
        Route::get('/admin/dashboard/category/edit/{slug}', 'edit')->name('edit-category');
        Route::post('/admin/dashboard/category/submit', 'insert')->name('insert-category');
        Route::post('/admin/dashboard/category/update', 'update')->name('update-category');
        Route::get('/admin/dashboard/category/softDelete/{id}', 'softDelete')->name('softDelete-category');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/dashboard/sub/category', 'index')->name('all-sub-category');
        Route::get('/admin/dashboard/sub/category/add', 'add')->name('add-sub-category');
        Route::get('/admin/dashboard/sub/category/edit/{slug}', 'edit')->name('edit-sub-category');
        Route::post('/admin/dashboard/sub/category/submit', 'insert')->name('insert-sub-category');
        Route::post('/admin/dashboard/sub/category/update', 'update')->name('update-sub-category');
        Route::get('/admin/dashboard/sub/category/softDelete/{id}', 'softDelete')->name('softDelete-sub-category');
    });
});

//admin without auth
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');


//vendor
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [vendorController::class, 'Vendor_dashboard'])->name('vendor.dashboard');
    Route::get('/vendor/profile', [vendorController::class, 'vendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/update', [vendorController::class, 'vendorProfileUpdate'])->name('vendor.profile.update');
    Route::get('/vendor/logout', [vendorController::class, 'vendorLogout'])->name('vendor.logout');
    Route::get('/vendor/change/password', [vendorController::class, 'vendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [vendorController::class, 'vendorUpdatePassword'])->name('vendor.update.password');
});

//vendor without auth
Route::get('/vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.login');

//frontend 
Route::get('/admin/login', [FrontendController::class, 'index'])->name('frontend');
require __DIR__ . '/auth.php';
