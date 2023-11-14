@extends('admin.admin_master');
@section('content')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="product_name" na class="form-label">Product Name</label>
                                    <input type="email" class="form-control" id="product_name" name="product_name"
                                        placeholder="Enter Product Name">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="inputProductDescription" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Product Images</label>
                                    <input id="image-uploadify" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        multiple>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Buy Price</label>
                                        <input type="email" class="form-control" id="product_buy_price" name="product_buy_price" placeholder="Buy Price">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Product Vat</label>
                                        <input type="email" class="form-control" id="product_vat" placeholder="Product Vat" name="product_vat">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Shipping Charge</label>
                                        <input type="email" class="form-control" id="product_shipping_const" placeholder="Product Vat" name="product_shipping_const">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Sell Price</label>
                                        <input type="email" class="form-control" id="product_sel_price" placeholder="Product Vat" name="product_sel_price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Discount Price</label>
                                        <input type="email" class="form-control" id="product_discount_price" placeholder="Product Vat" name="product_discount_price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Event Price</label>
                                        <input type="email" class="form-control" id="product_event_price" placeholder="Product Vat" name="product_event_price">
                                    </div>


                                    <div class="col-12">
                                        <label for="inputProductType" class="form-label">Category</label>

                                        @php
                                            $all_category = App\Models\Category::where('category_status', 1)->orderBy('category_name', 'ASC')->get();
                                        @endphp

                                        <select class="form-select" id="inputProductCategory" onchange="">
                                            <option value=" ">Select Category</option>
                                            @foreach ($all_category as $category)
                                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label">Vendor</label>
                                        <select class="form-select" id="inputVendor">
                                            <option></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Collection</label>
                                        <select class="form-select" id="inputCollection">
                                            <option></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Product Tags</label>
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Product Tags">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div>

    </div>
@endsection
