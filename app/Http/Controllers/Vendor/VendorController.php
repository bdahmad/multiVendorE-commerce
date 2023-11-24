<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Image;

class VendorController extends Controller
{

    // vendor apply page show
    public function vendorApply($slug) {
        return view('vendor.vendorApply', compact('slug'));
    }

    // vendor apply page show
    public function vendorApplySubmit(Request $request) {

        $user_slug = $request->slug;

        $this->validate($request,[
            'vendor_shop_name' => 'required|string|max:50|unique:users',
            'vendor_pay_of_line' => 'required|string|max:100',
            'vendor_short_description' => 'required|string|max:250',
            'vendor_shop_address' => 'required|string',
            'vendor_profile_pic' => 'required',
        ]);

        $vendor_shop_slug = Str::slug($request->vendor_shop_name);

        if($request->hasFile('vendor_profile_pic')){
            $image = $request->file('vendor_profile_pic');

            $customeName = "VP".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/vendor/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $update = User::where('slag', $user_slug)->update([
                'vendor_shop_name' => $request->vendor_shop_name,
                'vendor_pay_of_line' => $request->vendor_pay_of_line,
                'vendor_short_description' => $request->vendor_short_description,
                'vendor_shop_address' => $request->vendor_shop_address,
                'vendor_shop_slug' => $vendor_shop_slug,
                'vendor_join' => Carbon::now(),
                'vendor_profile_pic' => $customeName,
                'vendor_status_id' => 2,
            ]);

            if($update){
                $notification = array(
                    'message' => "Your Shop Created, Please Wait For Admin Active",
                    'alert-type' => "success",
                );

            }else{
                $notification = array(
                    'message' => "Opps, Something is Wrong",
                    'alert-type' => "error",
                );
            }
            return redirect()->route('/')->with($notification);
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendor.vendor_dashboard');
    }

    // vendor log in page view
    public function vendorLogin()
    {
        return view('vendor.vendor_login');
    }

    /**
     * Destroy an authenticated session. or vendor logout here
     */
    public function vendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }


    // vendor profile page show
    public function vendorProfile()
    {

        // fin all data
        $id = Auth::user()->user_id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile', compact('vendorData'));
    }

    // vendor profile update
    public function vendorProfileUpdate(Request $request)
    {

        $id = Auth::user()->user_id;

        $this->validate($request, [
            'vendor_shop_name' => 'required|max:50|unique:users,vendor_shop_name,' . $id . 'vendor_shop_name',
            'vendor_pay_of_line' => 'required|max:100|',
            'vendor_short_description' => 'required|max:255|',
            'email' => 'required|max:100|email|unique:users,email,' . $id . 'email',
            'phone' => 'required|numeric|min:10|unique:users,phone,' . $id . 'phone',
            'vendor_shop_address' => 'required|max:100|',
        ]);

        $user = User::find($id);

        $user->vendor_shop_name = $request->vendor_shop_name;
        $user->vendor_pay_of_line = $request->vendor_pay_of_line;
        $user->vendor_short_description = $request->vendor_short_description;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->vendor_shop_address = $request->vendor_shop_address;

        // notification set here
        if ($user->update()) {
            $notification = array(
                'message' => "Store Profile Update Successfully",
                'alert-type' => "success",
            );
        } else {
            $notification = array(
                'message' => "Opps, Store Profile Not Update",
                'alert-type' => "error",
            );
        }
        return back()->with($notification);
    }

    // vendor settings page show
    public function vendorSettings()
    {
        // fin all data
        $id = Auth::user()->user_id;
        $vendorData = User::find($id);

        return view('vendor.vendor_settings', compact('vendorData'));
    }

    // vendor profile Pic Update
    public function vendorProfilePicUpdate(Request $request)
    {

        // fin all data
        $id = Auth::user()->user_id;
        $vendorData = User::find($id);

        // check image here
        if ($request->vendor_profile_pic) {

            if (File::exists(public_path('uploads/vendor/' . $vendorData->vendor_profile_pic))) {
                File::delete(public_path('uploads/vendor/' . $vendorData->vendor_profile_pic));
            }
            $image = $request->file('vendor_profile_pic');
            $customeName = $id . "." . $image->getClientOriginalExtension();
            $path = public_path('uploads/vendor/' . $customeName);
            Image::make($image)->resize(250, 250)->save($path);

            $vendorData->vendor_profile_pic = $customeName;

            if ($vendorData->update()) {
                $notification = array(
                    'message' => "Store Profile Photo Update Successfully",
                    'alert-type' => "success",
                );
            } else {
                $notification = array(
                    'message' => "Opps, Store Profile Photo Not Update",
                    'alert-type' => "error",
                );
            }
            return back()->with($notification);
        } else {
            $notification = array(
                'message' => "Please Select Your Store Profile Photo",
                'alert-type' => "error",
            );
            return back()->with($notification);
        }
    }

    // vendor Password Update
    public function vendorPasswordUpdate(Request $request)
    {
        // form validation
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        // old password match
        if (Hash::check($request->old_password, auth()->user()->password)) {
            User::where('id', auth()->user()->id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('vendor.logout');
        } else {
            return back()->with('error', "Old Password Doesn't Match");
        }
    }

    // vendor social link update
    public function vendorSocialLinkUpdate(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
