<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard');
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
            return redirect()->back()->with("status", "Successfully changed password.");
        } else {
            return redirect()->back()->with("error", "Oops.. Operation failed.");
        }
    }
}
