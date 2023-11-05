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

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Brand::orderBy('id', 'DESC')->get();
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
            'brand_official_phone' => 'required|numeric|min:10|unique:brands',
            'brand_official_address' => 'required|string',
            'brand_image' => 'required',
        ]);

        if ($request->hasFile('brand_image')) {

            $image = $request->file('brand_image');

            $customeName = "B".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/brand/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $slug = Str::slug($request->brand_name);

            $insert = Brand::create([
                'brand_name' => $request->brand_name,
                'brand_pay_of_line' => $request->brand_pay_of_line,
                'brand_title' => $request->brand_title,
                'brand_description' => $request->brand_description,
                'brand_official_email' => $request->brand_official_email,
                'brand_official_phone' => $request->brand_official_phone,
                'brand_official_address' => $request->brand_official_address,
                'brand_slug' => $slug,
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
