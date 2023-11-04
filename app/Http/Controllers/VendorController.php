<?php

namespace App\Http\Controllers;


use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

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
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'vendor_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/images/vendor/' . $imageName);
            User::where('id', $id)->update([
                'photo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
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
    public function vendorUpdatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required | min:8',
            'confirmNewPassword' => 'required | required_with:new_password|same:new_password|min:8',
        ]);

        if (Hash::check($request['old_password'], auth::user()->password)) {

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request['new_password']),
            ]);

            return redirect()->route('vendor.logout')->with("status", "Successfully changed password.");
        } else {
            return back()->with("error", "Old Password didn't matched.");
        }
    }
}
