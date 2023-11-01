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
    public function vendorProfile()
    {
        $id = Auth::user()->id;
        $allData = User::where('id', $id)->firstOrfail();
        return view('vendor.vendor-profile', compact('allData'));
    }
    public function vendorProfileUpdate(Request $request)
    {
        $id = $request['id'];
        $update = User::where('id', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'vendor_join' => $request['vendor_join'],
            'vendor_short_info' => $request['vendor_short_info'],
        ]);
        if ($update) {
            $notification = array(
                'message' => 'Successfully Update Profile.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Oops..  Operation Failed.',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
}
