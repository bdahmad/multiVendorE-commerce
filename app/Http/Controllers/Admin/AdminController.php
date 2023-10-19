<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $this-> validate($request,[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'phone' => 'required|numeric|unique:users,phone|min:10',
            'address' => 'required|max:100',

        ]);

        $id = Auth::user()->id;

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address= $request->address;

        $message = "";

        if ($user->update()) {
            # code...
           $message = "User Update Successfully";
        }else{

            $message = "Opps, Something Is Wrong";

        }

        return redirect()->back()->with($message);
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
