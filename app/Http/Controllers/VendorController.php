<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VendorController extends Controller
{
    public function vendor_dashboard()
    {
        return view('vendor.vendor-dashboard');
    }
    public function vendorProfile()
    {
        $id = Auth::user()->id;
        $allData = User::where('id', $id)->firstOrfail();
        return view('vendor.vendor-profile', compact('allData'));
    }
    public function vendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }

    public function vendorLogin()
    {
        return view('vendor.vendor-login');
    }

    public function vendorChangePassword()
    {
        return view('vendor.vendor-change-password');
    }
}
