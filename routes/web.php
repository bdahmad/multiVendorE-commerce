<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// all public route route here
Route::get('/', function () {
    return view('index');
});






// all supper admin route here
Route::middleware(['auth','role:1','verified'])->group(function(){

    Route::get('/supper/admin/dashboard', [SuperadminController::class, 'index'])->name('supper.admin.dashboard');
});



// all admin route here
Route::middleware(['auth','role:2','verified'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    Route::get('/admin/settings', [AdminController::class, 'adminSettings'])->name('admin.settings');

    Route::post('/admin/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');

    Route::post('/admin/profile/pic/update', [AdminController::class, 'adminProfilePicUpdate'])->name('admin.profile.pic.update');

    Route::post('admin/social/link/update', [AdminController::class, 'adminSocialLinkUpdate'])->name('admin.social.link.update');


    Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');
});

// admin login route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');


// all vendor route here
Route::middleware(['auth','role:3','verified'])->group(function(){

    Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');

    Route::get('/vendor/logout', [VendorController::class, 'vendorLogout'])->name('vendor.logout');

    Route::get('/vendor/profile', [VendorController::class, 'vendorProfile'])->name('vendor.profile');

    Route::post('/vendor/profile/update', [VendorController::class, 'vendorProfileUpdate'])->name('vendor.profile.update');

    Route::get('/vendor/settings', [VendorController::class, 'vendorSettings'])->name('vendor.settings');

    Route::post('/vendor/profile/pic/update', [VendorController::class, 'vendorProfilePicUpdate'])->name('vendor.profile.pic.update');

    Route::post('/vendor/social/link/update', [VendorController::class, 'vendorSocialLinkUpdate'])->name('vendor.social.link.update');

    Route::post('/vendor/password/update', [VendorController::class, 'vendorPasswordUpdate'])->name('vendor.password.update');
});
// vendor login route
Route::get('/vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.login');



// // all user route
Route::middleware(['auth','role:4','verified'])->group(function(){

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('update/profile', [UserController::class, 'update'])->name('update.profile');
});
// for register page
Route::get('register', [UserController::class, 'create'])->name('register');
// for register post
Route::post('register/post', [UserController::class, 'store'])->name('register.post');

// for log in page
Route::get('login', [UserController::class, 'login_page'])->name('login');
// for log in request
Route::post('login/store', [AuthenticatedSessionController::class, 'store'])->name('loginStore');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



// require __DIR__.'/auth.php';
