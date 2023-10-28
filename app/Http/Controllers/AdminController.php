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
}
