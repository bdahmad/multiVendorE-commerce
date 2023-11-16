<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Backend\SubCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $all = SubCategory::where('sub_category_status', 1)->get();
        return view('admin.sub-category.all', compact('all'));
    }
    public function add()
    {
        return view('admin.sub-category.add');
    }
    public function edit($slug)
    {
        $edit = subCategory::where('sub_category_status', 1)->where('sub_category_slug', $slug)->firstOrfail();
        return view('admin.sub-category.edit', compact('edit'));
    }
    public function view()
    {
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'sub_category_name' => 'required',
            'sub_category_image' => 'required',
        ]);

        if ($request->hasFile('sub_category_image')) {
            $img = $request->file('sub_category_image');
            $imgName = 'sub_category_' . time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(120,120)->save('uploads/images/sub-category/' . $imgName);
        }
        $slug = Str::slug($request->sub_category_name);
        $insert = subCategory::insert([
            'sub_category_name' => $request->sub_category_name,
            'sub_category_slug' => $slug,
            'sub_category_image' => $imgName,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            $notification = array(
                'message' => 'sub category insert successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('all-sub-category')->with($notification);
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
            'sub_category_name' => 'required',
            'sub_category_image' => 'required',
        ]);

        if ($request->hasFile('sub_category_image')) {
            $img = $request->file('sub_category_image');
            $imgName = 'sub_category_' . time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(120, 120)->save('uploads/images/sub-category/' . $imgName);
        }

        $update = subCategory::where('subCategory_status', 1)->where('subCategory_slug', $slug)->update([
            'sub_category_name' => $request->subCategory_name,
            'sub_category_slug' => $slug,
            'sub_category_image' => $imgName,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'message' => 'sub category update successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('all-sub-category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Operation Failed.',
                'alert-type' => 'error'
            );
            return redirect()->route('edit-sub-category', $slug)->with($notification);
        }
    }
    public function softDelete($id)
    {
        $delete = subCategory::where('sub_category_status',1)->where('sub_category_id',$id)->update([
            'sub_category_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($delete){
            $notification = array(
                'message' => 'Successfully delete sub category item.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Operation Failed.',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
    public function restore()
    {
    }
    public function delete()
    {
    }
}
