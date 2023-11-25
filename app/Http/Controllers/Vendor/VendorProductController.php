<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMultiImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use Auth;
use File;

class VendorProductController extends Controller
{
     /**
     * Display all active product
     */
    public function vendorAllProduct()
    {
        $id = Auth::user()->user_id;
        $all = Product::where('vendor_id', $id)->where('deleted_at', null)->latest()->get();
        return view('vendor.product_manage.all_product', compact('all'));
    }

    /**
     * vendor create product
     */
    public function vendorAddProduct()
    {
        return view('vendor.product_manage.add_product');
    }
    /**
     * vendor store product
     */
    public function vendorStoreProduct(Request $request)
    {

        $this->validate($request,[

            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',

            'product_name' => 'required|string',

            'product_weight' => 'required|string',
            'product_quantity_type' => 'required|string',

            'product_buy_price' => 'required',
            'product_vat' => 'required',
            'product_shipping_const' => 'required',
            'product_sel_price' => 'required',

            'product_short_description' => 'required|string',
            'product_long_description' => 'required|string',
            'product_note' => 'required|string',

            'product_thumbnail' => 'required',
            'product_multi_image' => 'required',

        ]);

        $product_slug = Str::slug($request->product_name);
        $product_code = $request->product_slug.uniqid();

        // $product_info_for_QR_code = 'Product Name: '.$request->product_name.'product_code'.$request->$product_code.'Product Price'.$request->product_sel_price;
        // $product_barcode = DNS2D::getBarcodeSVG($product_info_for_QR_code, 'QRCODE');

        $id = Product::insertGetId([
            'product_slug' => $product_slug,
            'product_code' => $product_code,
            // 'product_barcode' => $product_barcode,

            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,

            'brand_id' => $request->brand_id,
            'vendor_id' => $request->vendor_id,
            'product_name' => $request->product_name,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'product_materials' => $request->product_materials,
            'product_tags' => $request->product_tags,
            'product_quality_tag' => $request->product_quality_tag,
            'product_weight' => $request->product_weight,
            'product_dimensions' => $request->product_dimensions,
            'product_sku' => $request->product_sku,
            'product_quantity_type' => $request->product_quantity_type,
            'product_buy_price' => $request->product_buy_price,
            'product_vat' => $request->product_vat,
            'product_shipping_const' => $request->product_shipping_const,
            'product_sel_price' => $request->product_sel_price,
            'product_discount_price' => $request->product_discount_price,
            'product_event_price' => $request->product_event_price,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_note' => $request->product_note,

            'product_hot_deals' => $request->product_hot_deals,
            'product_featured' => $request->product_featured,
            'product_special_offer' => $request->product_special_offer,
            'product_special_deals' => $request->product_special_deals,

            'product_status_id' => 2,
            'vendor_id' => Auth::user()->user_id,
            'product_creator_id' => Auth::user()->user_id,
            'created_at' => Carbon::now(),

        ]);

        if ($request->hasFile('product_thumbnail')) {

            $image = $request->file('product_thumbnail');

            $customeName = "PP".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/product/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            Product::where('product_id', $id)->update([
                'product_thumbnail' => $customeName,
            ]);
        }

        if($request->hasFile('product_multi_image')){

            $images = $request->file('product_multi_image');

            foreach ($images as  $image) {

                $customeName = "PMI".".".rand().time().".".$image->getClientOriginalExtension();
                $path = public_path('uploads/product/multi_image/'.$customeName);
                Image::make($image)->resize(250,250)->save($path);

                ProductMultiImage::insert([
                    'product_id' => $id,
                    'product_multi_image' => $customeName,
                ]);

           }

        }

        $notification = array(
            'message' => "Product Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('vendor.all.product')->with($notification);

    }

    /**
     * find sub category on category change dropdown.
     */
    public function vendorFindSubcategory($id)
    {
        $data = SubCategory::where('category_id', $id)->get();
        return json_decode($data);
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
    public function vendorEditProduct(string $slug)
    {
        $data = Product::where('product_slug', $slug)->first();
        return view('vendor.product_manage.edit_product', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function vendorUpdateProduct(Request $request)
    {

        $this->validate($request,[

            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',

            'product_name' => 'required|string',

            'product_weight' => 'required|string',
            'product_quantity_type' => 'required|string',

            'product_buy_price' => 'required',
            'product_vat' => 'required',
            'product_shipping_const' => 'required',
            'product_sel_price' => 'required',

            'product_short_description' => 'required|string',
            'product_long_description' => 'required|string',
            'product_note' => 'required|string',

        ]);


        $product_slug = Str::slug($request->product_name);
        $product_code = $request->product_slug.uniqid();

        $product = Product::where('product_slug', $request->slug)->first();

        $id = Product::where('product_slug', $request->slug)->update([
            'product_slug' => $product_slug,
            'product_code' => $product_code,
            // 'product_barcode' => $product_barcode,

            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,

            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'product_materials' => $request->product_materials,
            'product_tags' => $request->product_tags,
            'product_quality_tag' => $request->product_quality_tag,
            'product_weight' => $request->product_weight,
            'product_dimensions' => $request->product_dimensions,
            'product_sku' => $request->product_sku,
            'product_quantity_type' => $request->product_quantity_type,
            'product_buy_price' => $request->product_buy_price,
            'product_vat' => $request->product_vat,
            'product_shipping_const' => $request->product_shipping_const,
            'product_sel_price' => $request->product_sel_price,
            'product_discount_price' => $request->product_discount_price,
            'product_event_price' => $request->product_event_price,
            'product_short_description' => $request->product_short_description,
            'product_long_description' => $request->product_long_description,
            'product_note' => $request->product_note,

            'product_hot_deals' => $request->product_hot_deals,
            'product_featured' => $request->product_featured,
            'product_special_offer' => $request->product_special_offer,
            'product_special_deals' => $request->product_special_deals,

            'product_editor_id' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

        if ($request->hasFile('product_thumbnail')) {

            $image = $request->file('product_thumbnail');

            // find old image
            $old_image = Product::where('product_slug', $request->slug)->value('product_thumbnail');


            // delete old image
            if(File::exists(public_path('uploads/product/'.$old_image))){
                File::delete(public_path('uploads/product/'.$old_image));
            }

            $customeName = "PP".".".rand().time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/product/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);


            Product::where('product_slug', $product_slug)->update([
                'product_thumbnail' => $customeName,
            ]);
        }


        if($request->hasFile('product_multi_image')){

            $images = $request->file('product_multi_image');

            foreach ($images as  $image) {

                if(File::exists(public_path('uploads/product/multi_image/'.$image))){
                    File::delete(public_path('uploads/product/multi_image/'.$image));
                }

                $customeName = "PMI".".".rand().time().".".$image->getClientOriginalExtension();
                $path = public_path('uploads/product/multi_image/'.$customeName);
                Image::make($image)->resize(250,250)->save($path);

                ProductMultiImage::insert([
                    'product_id' => $id,
                    'product_multi_image' => $customeName,
                ]);

           }

        }

        $notification = array(
            'message' => "Product Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('vendor.all.product')->with($notification);


    }

    /**
     * update product multi image resource from storage.
     */
    public function vendorProductSingleImageUpdate(Request $request)
    {


        if($request->hasFile('product_single_image')){

            $old_img = ProductMultiImage::where('product_multi_image_id', $request->product_multi_image_id)->first();

            if(File::exists(public_path('uploads/product/multi_image/'.$old_img->product_multi_image))){

                File::delete(public_path('uploads/product/multi_image/'.$old_img->product_multi_image));
            }

            $image = $request->file('product_single_image');
            $customeName = "PMI".".".rand().time().".".$image->getClientOriginalExtension();
                $path = public_path('uploads/product/multi_image/'.$customeName);
                Image::make($image)->resize(250,250)->save($path);

                $old_img->product_multi_image = $customeName;
                $old_img->save();

                $notification = array(
                    'message' => "Product Image Updated Successfully",
                    'alert-type' => "success",
                );

                return back()->with($notification);

        }
    }

    /**
     * Inactive Product.
     */
    public function vendorInactiveProduct(string $slug)
    {

        $update = Product::where('product_slug', $slug)->update([
            'product_vendor_status_id' => 3,
            'updated_at' => Carbon::now(),
            'product_editor_id' => Auth::user()->user_id,
        ]);

        if($update){
            $notification = array(
                'message' => "Product Inactive Successfully",
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
     * Active Product.
     */
    public function vendorActiveProduct(string $slug)
    {

        $update = Product::where('product_slug', $slug)->update([
            'product_vendor_status_id' => 1,
            'updated_at' => Carbon::now(),
            'product_editor_id' => Auth::user()->user_id,
        ]);

        if($update){
            $notification = array(
                'message' => "Product Active Successfully",
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
     * Recycle the specified resource from storage.
     */
    public function vendorDeleteProduct(string $slug)
    {
        $update = Product::where('product_slug', $slug)->update([
            'deleted_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'product_editor_id' => Auth::user()->user_id,
        ]);

        if($update){
            $notification = array(
                'message' => "Product Move To Trash Successfully",
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
     * Show All Delete or Recycle Item.
     */
    public function recycle()
    {
        $id = Auth::user()->user_id;
        $all = Product::where('vendor_id', $id)->whereNotNull('deleted_at')->latest()->get();
        return view('vendor.product_manage.all_recycle_product', compact('all'));
    }

    /**
     * Permanently delete from storage.
     */
    public function restore(string $slug)
    {
        $update = Product::where('product_slug', $slug)->update([
            'deleted_at' => null,
            'updated_at' => Carbon::now(),
            'product_editor_id' => Auth::user()->user_id,
        ]);

        if($update){
            $notification = array(
                'message' => "Product Restore Successfully",
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

        $product = Product::where('product_slug', $slug)->first();

        // delete thumbnail image folder
        $image = $product->product_thumbnail;
        if(File::exists(public_path('uploads/product/'.$image))){
            File::delete(public_path('uploads/product/'.$image));
        }

        // delete multi image from folder
        $multi_image = ProductMultiImage::where('product_id', $product->product_id)->get();

        foreach ($multi_image as $image) {

            if(File::exists(public_path('uploads/product/multi_image/'.$image->product_multi_image))){
                File::delete(public_path('uploads/product/multi_image/'.$image->product_multi_image));
            }
        }

        $delete = Product::where('product_slug', $slug)->delete();

        if($delete){
            $notification = array(
                'message' => "Product Permanently Deleted Successfully",
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
}
