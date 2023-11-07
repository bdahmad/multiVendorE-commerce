<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $all = Brand::where('brand_status', 1)->get();
        return view('admin.brand.all', compact('all'));
    }
    public function add()
    {
        return view('admin.brand.add');
    }
    public function edit()
    {
    }
    public function view()
    {
    }
    public function insert()
    {
    }
    public function update()
    {
    }
    public function softDelete()
    {
    }
    public function restore()
    {
    }
    public function delete()
    {
    }
}
