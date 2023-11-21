<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultiImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use DNS1D;
use DNS2D;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display all active product
     */
    public function adminAllActiveProduct()
    {
        $all_active_product = Product::where('product_status_id', 1)->latest()->get();
        return view('admin.product_manage.all_active_product', compact('all_active_product'));
    }

    /**
     * admin create product
     */
    public function adminAddProduct()
    {
        return view('admin.product_manage.add_product');
    }
    /**
     * admin store product
     */
    public function adminStoreProduct(Request $request)
    {
        // dd($request);
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
        $product_info_for_QR_code = 'Product Name: '.$request->product_name.'product_code'.$request->$product_code.'Product Price'.$request->product_sel_price;
        $product_barcode = DNS2D::getBarcodeSVG($product_info_for_QR_code, 'QRCODE');

        $id = Product::insert([
            'product_slug' => $product_slug,
            'product_code' => $product_code,
            // 'product_barcode' => $product_barcode,

            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,

            'brand_id' => $request->brand_id,
            'vendor_id' => $request->vendor_id,
            'supplier_id' => $request->supplier_id,
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

            'product_status_id' => 1,
            'product_creator_id' => Auth::user()->id,
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

        return redirect()->route('admin.all.active.product')->with($notification);

    }

    /**
     * find sub category on category change dropdown.
     */
    public function adminFindSubcategory($id)
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
