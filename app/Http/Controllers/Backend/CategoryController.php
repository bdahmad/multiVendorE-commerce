<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;

class CategoryController extends Controller
{
    public function index()
    {
        $all = Category::where('category_status', 1)->get();
        return view('admin.category.all', compact('all'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function edit($slug)
    {
        $edit = Category::where('category_status', 1)->where('category_slug', $slug)->firstOrfail();
        return view('admin.category.edit', compact('edit'));
    }
    public function view()
    {
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'category_image' => 'required',
        ]);

        if ($request->hasFile('category_image')) {
            $img = $request->file('category_image');
            $imgName = 'category_' . time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save('uploads/images/category/' . $imgName);
        }
        $slug = Str::slug($request->category_name);
        $insert = Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_image' => $imgName,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
            $notification = array(
                'message' => 'Category insert successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('all-category')->with($notification);
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
            'category_name' => 'required',
            'category_image' => 'required',
        ]);

        if ($request->hasFile('category_image')) {
            $img = $request->file('category_image');
            $imgName = 'category_' . time() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save('uploads/images/category/' . $imgName);
        }

        $update = Category::where('category_status', 1)->where('category_slug', $slug)->update([
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_image' => $imgName,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($update) {
            $notification = array(
                'message' => 'Category update successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('all-category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Operation Failed.',
                'alert-type' => 'error'
            );
            return redirect()->route('edit-category', $slug)->with($notification);
        }
    }
    public function softDelete($id)
    {
        $delete = Category::where('category_status',1)->where('category_id',$id)->update([
            'category_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($delete){
            $notification = array(
                'message' => 'Successfully delete category item.',
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
