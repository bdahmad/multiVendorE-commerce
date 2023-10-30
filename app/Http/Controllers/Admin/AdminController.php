<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/admin_dashboard');
    }

    // admin log in page view
    public function adminLogin()
    {
        return view('admin.admin_login');
    }

     /**
     * Destroy an authenticated session. or admin logout here
     */
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    // admin profile page show
    public function adminProfile(){

        // fin all data
        $id = Auth::user()->id;
        $adminData = User::find($id);
        // print_r($adminData);
        return view('admin.admin_profile', compact('adminData'));
    }

    // admin profile update
    public function adminProfileUpdate(Request $request){

        $id = Auth::user()->id;

        $this->validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,'.$id.'email',
            'phone' => 'required|numeric|min:10|unique:users,phone,'.$id.'phone',
            'address' => 'required|max:100',

        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address= $request->address;

        // notification set here
        if ($user->update()) {
            $notification = array(
                'message' => "Admin Profile Update Successfully",
                'alert-type' => "success",
            );
        }else{
            $notification = array(
                'message' => "Opps, Admin Profile Not Update",
                'alert-type' => "error",
            );
        }
        return back()->with($notification);

    }

    // admin profile Pic Update
    public function adminProfilePicUpdate(Request $request){

        // fin all data
        $id = Auth::user()->id;
        $adminData = User::find($id);

        // check image here
        if($request->image){

            if(File::exists(public_path('uploads/admin/'.$adminData->photo))){
                File::delete(public_path('uploads/admin/'.$adminData->photo));
            }
            $image = $request->file('image');
            $customeName = $id.".".$image->getClientOriginalExtension();
            $path = public_path('uploads/admin/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $adminData->photo = $customeName;

            if ($adminData->update()) {
                $notification = array(
                    'message' => "Admin Profile Photo Update Successfully",
                    'alert-type' => "success",
                );
            }else{
                $notification = array(
                    'message' => "Opps, Admin Profile Photo Not Update",
                    'alert-type' => "error",
                );
            }
            return back()->with($notification);

        }else{
            $notification = array(
                'message' => "Please Select Your Photo",
                'alert-type' => "error",
            );
            return back()->with($notification);
        }

        // notification set here



    }

    // admin social link update
    public function adminSocialLinkUpdate(Request $request){

        $this->validate($request,[
            'link' => 'required',
        ]);

        $slug = $request['slug'];

        if ($slug == 'website') {
            // update website link
            $webinfo = SocialMedia::where('user_id',2)->where('social_media_slug', 'website')->update([
                'social_media_link' => $request['link']
            ]);

            if ($webinfo) {
                $notification = array(
                    'message' => "Admin Website Link Updated",
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
            $facebookinfo = SocialMedia::where('user_id',2)->where('social_media_slug', 'facebook')->update([
                'social_media_link' => $request['link']
            ]);

            if ($facebookinfo) {
                $notification = array(
                    'message' => "Admin Facebook Link Updated",
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
            $linkedininfo = SocialMedia::where('user_id',2)->where('social_media_slug', 'linkedin')->update([
                'social_media_link' => $request['link']
            ]);

            if ($linkedininfo) {
                $notification = array(
                    'message' => "Admin Linkedin Link Updated",
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

    // admin settings page show
    public function adminSettings()
    {
        // fin all data
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_settings', compact('adminData'));
    }

    // admin Password Update
    public function adminPasswordUpdate(Request $request)
    {
        // form validation
        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        // old password match
        if (Hash::check($request->old_password, auth()->user()->password)) {
            User::where('id', auth()->user()->id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('admin.logout');

        }else{
            return back()->with('error', "Old Password Doesn't Match");
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
