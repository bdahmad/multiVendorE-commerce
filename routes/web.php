<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('frontend.home.home');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::post('/dashboard/profile/update', [UserController::class, 'update'])->name('user.profile.update');
});

//admin with auth
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
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
