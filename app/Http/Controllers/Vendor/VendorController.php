<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Image;

class VendorController extends Controller
{
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
    public function vendorProfile(){

        // fin all data
        $id = Auth::user()->id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile', compact('vendorData'));
    }


    // vendor settings page show
    public function vendorSettings()
    {
        // fin all data
        $id = Auth::user()->id;
        $vendorData = User::find($id);

        return view('vendor.vendor_settings', compact('vendorData'));
    }

    // vendor social link update
    public function vendorSocialLinkUpdate(Request $request){

        $this->validate($request,[
            'link' => 'required',
        ]);

        $slug = $request['slug'];

        if ($slug == 'website') {
            // update website link
            $webinfo = SocialMedia::where('user_id',3)->where('social_media_slug', 'website')->update([
                'social_media_link' => $request['link']
            ]);

            if ($webinfo) {
                $notification = array(
                    'message' => "vendor Website Link Updated",
                    'alert-type' => "success",
                );
            }else{
                $notification = array(
                    'message' => "Opps, Something Is Wrong",
                    'alert-type' => "error",
                );
            }
            return back()->with($notification);
        }
        elseif($slug == 'facebook')
        {
            // update facebook link
            $facebookinfo = SocialMedia::where('user_id',3)->where('social_media_slug', 'facebook')->update([
                'social_media_link' => $request['link']
            ]);

            if ($facebookinfo) {
                $notification = array(
                    'message' => "vendor Facebook Link Updated",
                    'alert-type' => "success",
                );
            }else{
                $notification = array(
                    'message' => "Opps, Something Is Wrong",
                    'alert-type' => "error",
                );
            }
            return back()->with($notification);
        }
        elseif($slug == 'linkedin')
        {
            // update linkedin link
            $linkedininfo = SocialMedia::where('user_id',3)->where('social_media_slug', 'linkedin')->update([
                'social_media_link' => $request['link']
            ]);

            if ($linkedininfo) {
                $notification = array(
                    'message' => "vendor Linkedin Link Updated",
                    'alert-type' => "success",
                );
            }else{
                $notification = array(
                    'message' => "Opps, Something Is Wrong",
                    'alert-type' => "error",
                );
            }
            return back()->with($notification);
        }
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
