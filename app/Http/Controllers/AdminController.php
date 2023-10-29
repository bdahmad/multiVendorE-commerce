<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('adminbackend.dashboard.admin-dashboard');
    }
    public function adminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function adminLogin()
    {
        return view('adminbackend.dashboard.admin-login');
    }
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::where('id', $id)->firstOrfail();
        return view('adminbackend.dashboard.admin-profile', compact('adminData'));
    }
    public function adminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/images/admin/' . $data->photo));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/images/admin'), $fileName);
            $data['photo'] = $fileName;
        }

        $data->save();
        return redirect()->back();
    }
}
