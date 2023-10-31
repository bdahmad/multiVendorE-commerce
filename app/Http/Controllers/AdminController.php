<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard.admin-dashboard');
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
        return view('admin.dashboard.admin-login');
    }
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::where('id', $id)->firstOrfail();
        return view('admin.dashboard.admin-profile', compact('adminData'));
    }
    public function adminProfileUpdate(Request $request)
    {
        //way-1
        // $id = Auth::user()->id;
        // $data = User::find($id);
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->phone = $request->phone;
        // $data->address = $request->address;

        // if ($request->file('photo')) {
        //     $file = $request->file('photo');
        //     @unlink(public_path('uploads/images/admin/' . $data->photo));
        //     $fileName = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('uploads/images/admin'), $fileName);
        //     $data['photo'] = $fileName;
        // }

        // $data->save();
        // $notification = array(
        //     'message' => 'Successfully update Admin Profile',
        //     'alert-type' => 'success',
        // );
        // return redirect()->back()->with($notification);

        //way-2
        $id = $request['id'];
        $update = User::where('id', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        if ($update) {
            $notification = array(
                'message' => 'Admin Profile update successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Oops..Operation Failed.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function adminChangePassword()
    {
        return view('admin.dashboard.admin-change-password');
    }
    public function adminPasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirmNewPassword' => 'required',
        ]);

        if (Hash::check($request['old_password'], auth::user()->password)) {
            if ($request['new_password'] === $request['confirmNewPassword']) {
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request['new_password']),
                ]);
            } else {
                return back()->with("error", "Confirm Password didn't matched.");
            }
            return redirect()->route('admin.logout')->with("status", "Successfully changed password.");
        } else {
            return back()->with("error", "Old Password didn't matched.");
        }
    }
}
