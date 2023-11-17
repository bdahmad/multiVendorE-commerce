<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use File;
use Illuminate\Validation\Rules\Exists;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Brand::where('deleted_at', null)->latest()->get();
        return view('admin.brand.all_brand', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.add_brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required|string|max:50|unique:brands',
            'brand_pay_of_line' => 'required|string|max:100',
            'brand_title' => 'required|string|max:100',
            'brand_description' => 'required|string|max:250',
            'brand_official_email' => 'required|max:100|email|unique:brands',
            'brand_official_phone' => 'required|min:10|unique:brands',
            'brand_official_address' => 'required|string',
        ]);


        $slug = Str::slug($request->brand_name);

        if ($request->hasFile('brand_image')) {

            $image = $request->file('brand_image');

            $customeName = "B".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/brand/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $insert = Brand::create([
                'brand_name' => $request->brand_name,
                'brand_pay_of_line' => $request->brand_pay_of_line,
                'brand_title' => $request->brand_title,
                'brand_description' => $request->brand_description,
                'brand_official_email' => $request->brand_official_email,
                'brand_official_phone' => $request->brand_official_phone,
                'brand_official_address' => $request->brand_official_address,
                'brand_slug' => $slug,
                'brand_status' => 1,
                'brand_image' => $customeName,
                'brand_creator' => Auth::user()->id,
                'created_at' => Carbon::now(),

            ]);

            if($insert){
                $notification = array(
                    'message' => "Brand Added Successfully",
                    'alert-type' => "success",
                );

            }else{
                $notification = array(
                    'message' => "Opps, Something is Wrong",
                    'alert-type' => "error",
                );
            }
            return redirect()->route('admin.all.brand')->with($notification);
        }



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
    public function edit(string $slug)
    {
        $data = Brand::where('brand_slug', $slug)->firstOrFail();
        return view('admin.brand.edit_brand', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $id = $request->id;

        $this->validate($request,[
            'brand_name' => 'required|string|max:50|unique:brands,brand_name,'.$id.',brand_id',
            'brand_pay_of_line' => 'required|string|max:100',
            'brand_title' => 'required|string|max:100',
            'brand_description' => 'required|string|max:250',
            'brand_official_email' => 'required|max:100|email|unique:brands,brand_official_email,'.$id.',brand_id',
            'brand_official_phone' => 'required|min:10|unique:brands,brand_official_phone,'.$id.',brand_id',
            'brand_official_address' => 'required|string',
            'brand_status' => 'required',
        ]);



        $slug = Str::slug($request->brand_name);

        if ($request->hasFile('brand_image')) {

            $image = $request->file('brand_image');

            // delete old image
            $old_image = Brand::where('brand_id', $id)->value('brand_image');

            if(File::exists(public_path('uploads/brand/'.$old_image))){
                File::delete(public_path('uploads/brand/'.$old_image));
            }

            $customeName = "B".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/brand/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);


            $update = Brand::where('brand_id', $id)->update([
                'brand_image' => $customeName,
            ]);

        }

        $update = Brand::where('brand_id', $id)->update([
            'brand_name' => $request->brand_name,
            'brand_pay_of_line' => $request->brand_pay_of_line,
            'brand_title' => $request->brand_title,
            'brand_description' => $request->brand_description,
            'brand_official_email' => $request->brand_official_email,
            'brand_official_phone' => $request->brand_official_phone,
            'brand_official_address' => $request->brand_official_address,
            'brand_slug' => $slug,
            'brand_status' => $request->brand_status,
            'brand_editor' => Auth::user()->user_id,
            'updated_at' => Carbon::now(),
        ]);

        if($update){
            $notification = array(
                'message' => "Brand Updated Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.brand')->with($notification);

    }

    /**
     * Soft Delete the specified resource from storage.
     */
    public function softDelete(string $slug)
    {
        $update = Brand::where('brand_slug', $slug)->update([
            'deleted_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'brand_editor' => Auth::user()->user_id,
        ]);

        if($update){
            $notification = array(
                'message' => "Brand Move To Trash Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.brand')->with($notification);
    }


    /**
     * Show All Delete or Recycle Item.
     */
    public function recycle()
    {
        $all = Brand::whereNotNull('deleted_at')->latest()->get();
        return view('admin.brand.all_recycle_brand', compact('all'));
    }

    /**
     * Restore Delete or Recycle Item.
     */
    public function restore($slug)
    {
        $update = Brand::where('brand_slug', $slug)->update([
            'deleted_at' => null,
            'updated_at' => Carbon::now(),
            'brand_editor' => Auth::user()->user_id,
        ]);

        if($update){
            $notification = array(
                'message' => "Brand Restore Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return back()->with($notification);
    }

    /**
     * Permanently Delete Item.
     */
    public function permanentlyDelete($slug)
    {

        $image = Brand::where('brand_slug', $slug)->value('brand_image');
        if(File::exists(public_path('uploads/brand/'.$image))){
            File::delete(public_path('uploads/brand/'.$image));
        }

        $delete = Brand::where('brand_slug', $slug)->delete();

        if($delete){
            $notification = array(
                'message' => "Brand Permanently Deleted Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.brand')->with($notification);
    }
}
