<?php

use App\Http\Controllers\Admin\AdminController;
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

// all supper admin route here
Route::middleware(['auth','role:1','verified'])->group(function(){

    Route::get('/supper/admin/dashboard', [SuperadminController::class, 'index'])->name('supper.admin.dashboard');
});




// all admin route here
Route::middleware(['auth','role:2','verified'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    Route::post('/admin/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin.profile.update');

    Route::post('/admin/profile/pic/update', [AdminController::class, 'adminProfilePicUpdate'])->name('admin.profile.pic.update');
});

// admin login route
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');


// all vendor route here
Route::middleware(['auth','role:3','verified'])->group(function(){

    Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
});

// // all user route
// Route::middleware(['auth','role:user','verified'])->group(function(){
//     Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// all public route route here
Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';
