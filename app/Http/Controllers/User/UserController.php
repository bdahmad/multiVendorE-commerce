<?php

namespace App\Http\Controllers\User;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function update(Request $request)
    {
        $id = $request['id'];

        $update = User::where('id', $id)->update([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],

        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = 'user_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250, 250)->save('uploads/images/user/' . $imageName);
            User::where('id', $id)->update([
                'photo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        if ($update) {

            $notification = array(
                'message' => 'Successfully update Profile',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Oops. Operation failed.',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
    public function updatePassword(Request $request)
    {
        $id = $request['id'];

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required_with:new_password|same:new_password',
        ]);

        $update = User::where('id', $id)->update([
            'password' => Hash::make($request['new_password']),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'message' => 'Successfully Changed password.',
                'status' => 'success',
            );
            return redirect()->route('user.logout')->with($notification);
        } else {
            $notification = array(
                'message' => 'Oops. Operation failed.',
                'status' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
}
