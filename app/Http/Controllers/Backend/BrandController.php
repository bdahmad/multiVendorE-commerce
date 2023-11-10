<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    public function edit($slug)
    {
        $edit = Brand::where('brand_status', 1)->where('brand_slug', $slug)->firstOrfail();
        return view('admin.brand.edit', compact('edit'));
    }
    public function view()
    {
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);

        if ($request->hasFile('brand_image')) {
            $img = $request->file('brand_image');
            $imgName = 'brand_' . time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save('uploads/images/brand/' . $imgName);
        }
        $slug = 'brand_' . uniqid();
        $insert = Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => $slug,
            'brand_image' => $imgName,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            $notification = array(
                'message' => 'Brand insert successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('all-brand')->with($notification);
        } else {
            $notification = array(
                'message' => 'Operation Failed.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function update(Request $request)
    {
        $slug = $request->slug;
        $this->validate($request, [
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);

        if ($request->hasFile('brand_image')) {
            $img = $request->file('brand_image');
            $imgName = 'brand_' . time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save('uploads/images/brand/' . $imgName);
        }

        $update = Brand::where('brand_status', 1)->where('brand_slug', $slug)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => $slug,
            'brand_image' => $imgName,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'message' => 'Brand update successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('all-brand')->with($notification);
        } else {
            $notification = array(
                'message' => 'Operation Failed.',
                'alert-type' => 'error'
            );
            return redirect()->route('edit-brand', $slug)->with($notification);
        }
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
