<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;
use File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = SubCategory::where('deleted_at', null)->latest()->get();
        return view('admin.subCategory.all_sub_category', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subCategory.add_sub_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sub_category_name' => 'required|string|max:50|unique:sub_categories',
            'category_id' => 'required',
            'sub_category_image' => 'required',
        ]);

        $category_slug = Category::where('category_id', $request->category_id)->value('category_slug');

        $slug = Str::slug($request->sub_category_name);

        if ($request->hasFile('sub_category_image')) {

            $image = $request->file('sub_category_image');

            $customeName = "SC".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/subCategory/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $insert = Subcategory::insert([
                'sub_category_name' => $request->sub_category_name,
                'sub_category_slug' => $slug,
                'category_id' => $request->category_id,
                'category_slug' => $category_slug,
                'sub_category_status' => 1,
                'sub_category_image' => $customeName,
                'sub_category_creator' => Auth::user()->id,
                'created_at' => Carbon::now(),

            ]);

            if($insert){
                $notification = array(
                    'message' => "Sub Category Added Successfully",
                    'alert-type' => "success",
                );

            }else{
                $notification = array(
                    'message' => "Opps, Something is Wrong",
                    'alert-type' => "error",
                );
            }
            return redirect()->route('admin.all.sub.category')->with($notification);
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
        $data = SubCategory::where('sub_category_slug', $slug)->firstOrFail();
        return view('admin.subCategory.edit_sub_category', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request,[
            'sub_category_name' => 'required|string|max:50|unique:sub_categories,sub_category_name,'.$id.',sub_category_id',
            'category_id' => 'required',
            'sub_category_status' => 'required',
        ]);


        $category_slug = Category::where('category_id', $request->category_id)->value('category_slug');
        $slug = Str::slug($request->sub_category_name);

        if ($request->hasFile('sub_category_image')) {

            $image = $request->file('sub_category_image');

            // delete old image
            $old_image = SubCategory::where('sub_category_id', $id)->value('sub_category_image');

            if(File::exists(public_path('uploads/subCategory/'.$old_image))){
                File::delete(public_path('uploads/subCategory/'.$old_image));
            }

            $customeName = "SC".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/subCategory/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $update = Subcategory::where('sub_category_id', $id)->update([
                'sub_category_image' => $customeName,
            ]);

        }
        $update = SubCategory::where('sub_category_id', $id)->update([
            'sub_category_name' => $request->sub_category_name,
            'category_id' => $request->category_id,
            'category_slug' => $category_slug,
            'sub_category_slug' => $slug,
            'sub_category_status' => $request->sub_category_status,
            'sub_category_editor' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        if($update){
            $notification = array(
                'message' => "Sub Category Updated Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.sub.category')->with($notification);

    }

    /**
     * Soft Delete the specified resource from storage.
     */
    public function softDelete(string $slug)
    {


        $update = Subcategory::where('sub_category_slug', $slug)->update([
            'deleted_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'sub_category_editor' => Auth::user()->id,
        ]);

        if($update){
            $notification = array(
                'message' => "Sub Category Move To Trash Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.sub.category')->with($notification);
    }


    /**
     * Show All Delete or Recycle Item.
     */
    public function recycle()
    {
        $all = SubCategory::whereNotNull('deleted_at')->latest()->get();
        return view('admin.subCategory.all_recycle_sub_category', compact('all'));
    }

    /**
     * Restore Delete or Recycle Item.
     */
    public function restore($slug)
    {
        $update = Subcategory::where('sub_category_slug', $slug)->update([
            'deleted_at' => null,
            'updated_at' => Carbon::now(),
            'sub_category_editor' => Auth::user()->id,
        ]);

        if($update){
            $notification = array(
                'message' => "Sub Category Restore Successfully",
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

        $image = Subcategory::where('sub_category_slug', $slug)->value('sub_category_image');
        if(File::exists(public_path('uploads/subCategory/'.$image))){
            File::delete(public_path('uploads/subCategory/'.$image));
        }

        $delete = Subcategory::where('sub_category_slug', $slug)->delete();

        if($delete){
            $notification = array(
                'message' => "Sub Category Permanently Deleted Successfully",
                'alert-type' => "success",
            );

        }else{
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.sub.category')->with($notification);
    }
}
