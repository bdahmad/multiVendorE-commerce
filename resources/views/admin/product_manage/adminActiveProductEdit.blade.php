@extends('admin.admin_master')
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Product Information</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('admin.all.active.product')}}" class="btn btn-primary">All Active Product</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <form action="{{route('admin.update.product')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product Information</h5>
                <hr/>
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">

                                <div class="form-group mb-3 ">
                                    <label for="product_name" na class="form-label">Product Name</label>

                                    <input type="hidden" id="slug" name="slug" value="{{$data->product_slug}}">

                                    <input type="text" class="form-control @error('product_name')
                                        is-invalid
                                    @enderror" id="product_name" name="product_name"
                                        placeholder="Enter Product Name"  value="@if($data->product_name){{$data->product_name}}@else{{old('product_name')}}@endif" />

                                        @error('product_name')
                                            <span class="text-danger"></span>{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product_size" na class="form-label">Product Size</label>
                                    <input type="text" class="form-control visually-hidden" id="product_size"
                                        name="product_size" data-role="tagsinput" placeholder="S, M, L, Xl, XXL, 3XL" value="@if($data->product_size){{$data->product_size}}@else{{old('product_size')}}@endif">

                                </div>

                                <div class="mb-3">
                                    <label for="product_color" na class="form-label">Product Color</label>
                                    <input type="text" class="form-control visually-hidden" id="product_color"
                                        name="product_color" data-role="tagsinput"
                                        placeholder="Red, White, Black, Blue, Purpel, Pink" value="@if($data->product_color){{$data->product_color}}@else{{old('product_color')}}@endif" >
                                </div>

                                <div class="mb-3">
                                    <label for="product_materials" na class="form-label">Product Materials</label>
                                    <input type="text" class="form-control visually-hidden" id="product_materials"
                                        name="product_materials" data-role="tagsinput" placeholder="Cutton, Fiber" value="@if($data->product_materials){{$data->product_materials}}@else{{old('product_materials')}}@endif">
                                </div>

                                <div class="mb-3">
                                    <label for="product_tags" na class="form-label">Product Tag</label>
                                    <input type="text" class="form-control visually-hidden" id="product_tags"
                                        name="product_tags" data-role="tagsinput" placeholder="New Product, Top Product, Hot Product" value="@if($data->product_tags){{$data->product_tags}}@else{{old('product_tags')}}@endif">
                                </div>

                                <div class="mb-3">
                                    <label for="product_quality_tag" na class="form-label">Product Quality Tag</label>
                                    <input type="text" class="form-control visually-hidden" id="product_quality_tag"
                                        name="product_quality_tag" data-role="tagsinput" placeholder="Regular, Premium" value="@if($data->product_quality_tag){{$data->product_quality_tag}}@else{{old('product_quality_tag')}}@endif">
                                </div>

                                <div class="mb-3">
                                    <label for="product_weight" na class="form-label">Product Weight</label>
                                    <input type="text" class="form-control visually-hidden @error('product_weight')
                                        is-invalid
                                    @enderror" id="product_weight"
                                        name="product_weight" data-role="tagsinput" placeholder="250gm, 500gm, 1kg, 5kg, 10kg" value="@if($data->product_weight){{$data->product_weight}}@else{{old('product_weight')}}@endif">
                                    @error('product_weight')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product_dimensions" na class="form-label">Product Dimensions</label>
                                    <input type="text" class="form-control visually-hidden" id="product_dimensions"
                                        name="product_dimensions" data-role="tagsinput"
                                        placeholder="6.65 x 3.01 x 0.35 in, 7.65 x 4.01 x 0.70 in" value="@if($data->product_dimensions){{$data->product_dimensions}}@else{{old('product_dimensions')}}@endif">
                                </div>

                                <div class="mb-3">
                                    <label for="product_quantity_type" na class="form-label">Product Quantity Type</label>
                                    <select class="form-select @error('product_quantity_type')
                                        is-invalid
                                    @enderror" id="product_quantity_type"
                                        name = "product_quantity_type">
                                        <option value="{{$data->product_quantity_type}}">{{$data->product_quantity_type}}</option>

                                    </select>
                                    @error('product_quantity_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Buy Price</label>
                                        <input type="number" class="form-control @error('product_buy_price')
                                            is-invalid
                                        @enderror" id="product_buy_price"
                                            name="product_buy_price" placeholder="500" value="@if($data->product_buy_price){{$data->product_buy_price}}@else{{old('product_buy_price')}}@endif">
                                        @error('product_buy_price')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Product Vat</label>
                                        <input type="number" class="form-control @error('product_vat')
                                            is-invalid
                                        @enderror" id="product_vat"
                                            placeholder="10%" name="product_vat" value="@if($data->product_vat){{$data->product_vat}}@else{{old('product_vat')}}@endif">
                                        @error('product_vat')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Shipping Charge</label>
                                        <input type="number" class="form-control @error('product_shipping_const')
                                            is-invalid
                                        @enderror" id="product_shipping_const"
                                            placeholder="100" name="product_shipping_const" value="@if($data->product_shipping_const){{$data->product_shipping_const}}@else{{old('product_shipping_const')}}@endif">
                                            @error('product_shipping_const')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Sell Price</label>
                                        <input type="number" class="form-control @error('product_sel_price')
                                            is-invalid
                                        @enderror" id="product_sel_price"
                                            placeholder="800" name="product_sel_price" value="@if($data->product_sel_price){{$data->product_sel_price}}@else{{old('product_sel_price')}}@endif">
                                            @error('product_sel_price')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Discount Price</label>
                                        <input type="number" class="form-control" id="product_discount_price"
                                            placeholder="10%" name="product_discount_price" value="@if($data->product_discount_price){{$data->product_discount_price}}@else{{old('product_discount_price')}}@endif">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Event Price</label>
                                        <input type="number" class="form-control" id="product_event_price"
                                            placeholder="700" name="product_event_price" value="@if($data->product_event_price){{$data->product_event_price}}@else{{old('product_event_price')}}@endif">
                                    </div>


                                    <div class="col-12">
                                        <label for="category_id" class="form-label">Category</label>

                                        @php
                                            $category = App\Models\Category::where('category_status', 1)->where('category_id', $data->category_id)->first();

                                        @endphp

                                        <select class="form-select @error('category_id')
                                            is-invalid
                                        @enderror" id="category_id" name="category_id">

                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                        </option>

                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="sub_category_id" class="form-label">Sub Category</label>

                                        @php
                                            $sub_category = App\Models\SubCategory::where('sub_category_status', 1)->where('sub_category_id', $data->sub_category_id)->first();

                                        @endphp

                                        <select class="form-select @error('sub_category_id')
                                            is-invalid
                                        @enderror" id="sub_category_id" name="sub_category_id">

                                        <option value="{{ $sub_category->sub_category_id }}">{{ $sub_category->sub_category_name }}
                                        </option>

                                        </select>
                                        @error('sub_category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="brand_id" class="form-label">Brand</label>

                                        @php
                                            $brand = App\Models\Brand::where('brand_status', 1)->where('brand_id', $data->brand_id)->first();

                                        @endphp

                                        <select class="form-select @error('brand_id')
                                            is-invalid
                                        @enderror" id="brand_id" name="brand_id">

                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}
                                        </option>

                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="vendor_id" class="form-label">Vendor</label>

                                        @php

                                            $vendor = App\Models\User::where('status_id', 1)->where('user_id', $data->vendor_id)->first();
                                        @endphp

                                        <select class="form-select @error('vendor_id')
                                            is-invalid
                                        @enderror" id="vendor_id" name="vendor_id">
                                        <option value="{{$vendor->user_id}}">{{$vendor->vendor_shop_name}}</option>
                                        </select>
                                        @error('vendor_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                    {{-- <div class="col-12">
                                        <label for="inputCollection" class="form-label">Product Supplyer</label>
                                        <select class="form-select" id="inputCollection">
                                            <option>Example 1</option>
                                            <option>Example 2</option>
                                            <option>Example 3</option>
                                        </select>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value="hot_deals"
                                                id="product_hot_deals" name="product_hot_deals" @if ($data->product_hot_deals)
                                                    checked
                                                @endif>
                                            <label class="form-check-label" for="product_hot_deals">Hot Deals</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="featured_product"
                                                id="product_featured" name="product_featured" @if ($data->product_featured)
                                                checked
                                            @endif>
                                            <label class="form-check-label" for="product_featured">Featured
                                                Product</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name= "product_special_offer" value="special_offer"
                                                id="special_offer" @if ($data->	product_special_offer)
                                                checked
                                            @endif>
                                            <label class="form-check-label" for="special_offer">Special Offer</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="special_deals"
                                                id="special_deals" name="product_special_deals" @if ($data->product_special_deals)
                                                checked
                                            @endif>
                                            <label class="form-check-label" for="special_deals">Special Deals</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 mt-3 ">
                            <label for="product_short_description" name="product_short_description"
                                class="form-label">Product Short Description</label>
                            <textarea class="form-control summernote @error('product_short_description')
                            is-invalid
                            @enderror" name="product_short_description" rows="3">@if ($data->product_short_description){{$data->product_short_description}}@else{{old('product_short_description')}}@endif</textarea>

                            @error('product_short_description')
                                <span class="text-white bg-dark">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_long_description" name="product_long_description"
                                class="form-label">Product Long Description</label>
                            <textarea class="form-control summernote @error('product_long_description')
                                is-invalid
                            @enderror" name="product_long_description" rows="3">@if ($data->product_long_description){{$data->product_long_description}}@else{{old('product_long_description')}}@endif</textarea>

                            @error('product_long_description')
                                <span class="text-white bg-dark">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_note" name="product_note" class="form-label">Product Note</label>
                            <textarea class="form-control summernote @error('product_note')
                                is-invalid
                            @enderror" name="product_note" rows="3">@if ($data->product_note){{$data->product_note}}@else{{old('product_note')}}@endif</textarea>
                            @error('product_note')
                                <span class="text-white bg-dark">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputProductTitle" class="form-label">Main Thambnail</label>
                            <input name="product_thumbnail" class="form-control @error('product_thumbnail')
                                is-invalid
                            @enderror" type="file" id="formFile"
                                onChange="mainThamUrl(this)">
                            @error('product_thumbnail')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <img class="my-3" src="@if ($data->product_thumbnail)
                                {{asset('uploads/product/'.$data->product_thumbnail)}}
                            @endif" id="mainThmb" style="width: 150px"/>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="reset" class="btn btn-danger" id="admin_product_add_reset_btn" />
                    <button type="submit" class="btn btn-success" id="admin_product_add_btn">Update Product</button>
                </div>
            </div><!--end row-->
        </div>
    </form>


    <div class="card">
        <div class="card-header">
            <h5>Multiple Image</h5>
        </div>
        <div class="card-body">

            <div class="">
                <table class="table table-info">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $old_multi_img = App\Models\ProductMultiimage::where('product_id', $data->product_id)->get();
                        @endphp

                        @foreach ($old_multi_img as $key => $single_img)

                        <tr class="">
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset('uploads/product/multi_image/'.$single_img->product_multi_image)}}" alt="" srcset="" style="width: 100px">
                            </td>
                            <td>
                                <a  class="btn btn-info btn-sm" data-id="{{$single_img->product_multi_image_id }}" id="edit_multi_img_btn" data-bs-toggle="modal" data-bs-target="#imgUploadModal"><i class="fa fa-pencil"></i></a>

                                <a class="btn btn-danger btn-sm" id="delete_multi_img_btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


            <!-- Modal -->
                <div class="modal fade" id="imgUploadModal" tabindex="-1" aria-labelledby="imgUploadModalLabel" aria-hidden="true">
                    <form action="{{route('admin.product.single.image.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="imgUploadModalLabel">Upload Image</h1>
                                </div>
                                <div class="modal-body">
                                <input type="hidden" name="product_multi_image_id" id="multi_img_id">
                                <input type="file" name="product_single_image">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Save Image</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

        </div>
    </div>

    </div>
    </div>

    </div>


    {{-- for sub category load  --}}
    <script>
        $(document).ready(function() {

            // for search and select option
            $('.searchAndSelect').select2();

            $('.summernote').summernote();

        });

        // single image preview
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


         //Modal code start
            $(document).ready(function(){

                $(document).on("click", "#edit_multi_img_btn", function () {
                    var multiImageID = $(this).data('id');
                    $(".modal-body #multi_img_id").val( multiImageID );
                });

                // $(document).on("click", "#softdelete", function () {
                //         var restoreID = $(this).data('id');
                //         $(".modal_body #modal_id").val( restoreID );
                //     });

                // $(document).on("click", "#delete", function () {
                //         var deleteID = $(this).data('id');
                //         $(".modal_body #modal_id").val( deleteID );
                //     });
            });


    </script>
@endsection


