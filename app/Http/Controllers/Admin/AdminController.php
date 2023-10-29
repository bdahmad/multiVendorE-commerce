<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
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

        $this-> validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,'.$id.'email',
            'phone' => 'required|numeric|min:10|unique:users,phone,'.$id.'phone',
            'address' => 'required|max:100',

        ]);

        $id = Auth::user()->id;

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
    public function adminSocialLinkUpdate(){

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
