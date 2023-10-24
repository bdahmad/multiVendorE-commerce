<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function vendor_dashboard()
    {
        return view('vendor.vendor_dashboard');
    }
}
