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

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = Category::where('deleted_at', null)->latest()->get();
        return view('admin.category.all_category', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string|max:50|unique:categories',
            'category_image' => 'required',
        ]);


        $slug = Str::slug($request->category_name);

        if ($request->hasFile('category_image')) {

            $image = $request->file('category_image');

            $customeName = "C" . "." . rand() . time() . "." . $image->getClientOriginalExtension();
            $path = public_path('uploads/category/' . $customeName);
            Image::make($image)->resize(250, 250)->save($path);

            $insert = category::insert([
                'category_name' => $request->category_name,
                'category_slug' => $slug,
                'category_status' => 1,
                'category_image' => $customeName,
                'category_creator' => Auth::user()->id,
                'created_at' => Carbon::now(),

            ]);

            if ($insert) {
                $notification = array(
                    'message' => "Category Added Successfully",
                    'alert-type' => "success",
                );
            } else {
                $notification = array(
                    'message' => "Opps, Something is Wrong",
                    'alert-type' => "error",
                );
            }
            return redirect()->route('admin.all.category')->with($notification);
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
        $data = Category::where('category_slug', $slug)->firstOrFail();
        return view('admin.category.edit_category', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            'category_name' => 'required|string|max:50|unique:categories,category_name,' . $id . 'category_name',
            'category_status' => 'required',
        ]);



        $slug = Str::slug($request->category_name);

        if ($request->hasFile('category_image')) {

            $image = $request->file('category_image');

            // delete old image
            $old_image = Category::where('id', $id)->value('category_image');

            if (File::exists(public_path('uploads/category/' . $old_image))) {
                File::delete(public_path('uploads/category/' . $old_image));
            }

            $customeName = "C" . "." . rand() . time() . "." . $image->getClientOriginalExtension();
            $path = public_path('uploads/category/' . $customeName);
            Image::make($image)->resize(250, 250)->save($path);

            $update = category::where('id', $id)->update([
                'category_name' => $request->category_name,
                'category_slug' => $slug,
                'category_image' => $customeName,
                'category_status' => $request->category_status,
                'category_editor' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            if ($update) {
                $notification = array(
                    'message' => "Category Updated Successfully",
                    'alert-type' => "success",
                );
            } else {
                $notification = array(
                    'message' => "Opps, Something is Wrong",
                    'alert-type' => "error",
                );
            }
            return redirect()->route('admin.all.category')->with($notification);
        } else {
            $update = Category::where('id', $id)->update([
                'category_name' => $request->category_name,
                'category_slug' => $slug,
                'category_status' => $request->category_status,
                'category_editor' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            if ($update) {
                $notification = array(
                    'message' => "Category Updated Successfully",
                    'alert-type' => "success",
                );
            } else {
                $notification = array(
                    'message' => "Opps, Something is Wrong",
                    'alert-type' => "error",
                );
            }
            return redirect()->route('admin.all.category')->with($notification);
        }
    }

    /**
     * Soft Delete the specified resource from storage.
     */
    public function softDelete(string $slug)
    {

        $update = Category::where('category_slug', $slug)->update([
            'deleted_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'category_editor' => Auth::user()->id,
        ]);

        if ($update) {

            // soft delete all related subcategory
            $all_sub_category = SubCategory::where('category_slug', $slug)->get();

            foreach ($all_sub_category as $single_sub_category) {
                $single_sub_category->deleted_at = Carbon::now();
                $single_sub_category->save();
            }

            $notification = array(
                'message' => "Category Move To Trash With Subcategory Successfully",
                'alert-type' => "success",
            );
        } else {
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.category')->with($notification);
    }


    /**
     * Show All Delete or Recycle Item.
     */
    public function recycle()
    {
        $all = Category::whereNotNull('deleted_at')->latest()->get();
        return view('admin.category.all_recycle_category', compact('all'));
    }

    /**
     * Restore Delete or Recycle Item.
     */
    public function restore($slug)
    {
        $update = Category::where('category_slug', $slug)->update([
            'deleted_at' => null,
            'updated_at' => Carbon::now(),
            'category_editor' => Auth::user()->id,
        ]);

        if ($update) {
            // restore all related subcategory
            $all_sub_category = SubCategory::where('category_slug', $slug)->get();

            foreach ($all_sub_category as $single_sub_category) {
                $single_sub_category->deleted_at = null;
                $single_sub_category->save();
            }
            $notification = array(
                'message' => "Category Restore With Subcategory Successfully",
                'alert-type' => "success",
            );
        } else {
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

        $image = Category::where('category_slug', $slug)->value('category_image');
        if (File::exists(public_path('uploads/category/' . $image))) {
            File::delete(public_path('uploads/category/' . $image));
        }

        // Permanently delete all related subcategory image
        $all_sub_category = SubCategory::where('category_slug', $slug)->get();

        foreach ($all_sub_category as $single_sub_category) {

            if (File::exists(public_path('uploads/subCategory/' . $single_sub_category->sub_category_image))) {
                File::delete(public_path('uploads/subCategory/'.$single_sub_category->sub_category_image));
            }
        }

        $delete = Category::where('category_slug', $slug)->delete();

        if ($delete) {

            $notification = array(
                'message' => "Category Permanently Deleted With Subcategory Successfully",
                'alert-type' => "success",
            );
        } else {
            $notification = array(
                'message' => "Opps, Something is Wrong",
                'alert-type' => "error",
            );
        }
        return redirect()->route('admin.all.category')->with($notification);
    }
}
