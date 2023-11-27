<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductMultiImage;

class FrontendController extends Controller
{
    /**
     * find sub category on category change dropdown.
     */
    public function findSubcategory($id)
    {
        $data = SubCategory::where('category_id', $id)->get();
        return json_decode($data);
    }
    /**
     * find product details
     */
    public function productDetails($slug)
    {

       $product = Product::where('product_slug', $slug)->first();
       $product_multi_img = ProductMultiImage::where('product_id', $product->product_id)->get();

       return view('product_details', compact('product', 'product_multi_img'));
    }

    /**
     * find vendor.
     */
    public function vendorDetails($slug)
    {

       $vendor = User::where('slug', $slug)->first();
       $product = Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('vendor_id',$vendor->user_id)->latest()->get();
       return view('vendor_details', compact('vendor','product'));
    }
}
