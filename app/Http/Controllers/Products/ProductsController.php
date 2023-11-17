<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

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
