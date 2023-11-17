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
                    <a href="{{route('admin.all.active.product')}}" class="btn btn-primary">All Active Product</a>
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
                                <div class="form-group mb-3 ">
                                    <label for="product_name" na class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="Enter Product Name">
                                </div>

                                <div class="mb-3">
                                    <label for="product_size" na class="form-label">Product Size</label>
                                    <input type="text" class="form-control visually-hidden" id="product_size"
                                        name="product_size" data-role="tagsinput" value="S, M, L, Xl, XXL, 3XL">
                                </div>

                                <div class="mb-3">
                                    <label for="product_color" na class="form-label">Product Color</label>
                                    <input type="text" class="form-control visually-hidden" id="product_color"
                                        name="product_color" data-role="tagsinput"
                                        value="Red, White, Black, Blue, Purpel, Pink">
                                </div>

                                <div class="mb-3">
                                    <label for="product_materials" na class="form-label">Product Materials</label>
                                    <input type="text" class="form-control visually-hidden" id="product_materials"
                                        name="product_materials" data-role="tagsinput" value="Cutton, Fiber">
                                </div>

                                <div class="mb-3">
                                    <label for="product_tags" na class="form-label">Product Tag</label>
                                    <input type="text" class="form-control visually-hidden" id="product_tags"
                                        name="product_tags" data-role="tagsinput" value="New Product, Top Product">
                                </div>

                                <div class="mb-3">
                                    <label for="product_quality_tag" na class="form-label">Product Quality Tag</label>
                                    <input type="text" class="form-control visually-hidden" id="product_quality_tag"
                                        name="product_quality_tag" data-role="tagsinput" value="Regular, Premium">
                                </div>

                                <div class="mb-3">
                                    <label for="product_weight" na class="form-label">Product Weight</label>
                                    <input type="text" class="form-control visually-hidden" id="product_weight"
                                        name="product_weight" data-role="tagsinput" value="250gm, 500gm, 1kg, 5kg, 10kg">
                                </div>

                                <div class="mb-3">
                                    <label for="product_dimensions" na class="form-label">Product Dimensions</label>
                                    <input type="text" class="form-control visually-hidden" id="product_dimensions"
                                        name="product_dimensions" data-role="tagsinput"
                                        value="6.65 x 3.01 x 0.35 in, 7.65 x 4.01 x 0.70 in">
                                </div>

                                <div class="mb-3">
                                    <label for="product_quantity_type" na class="form-label">Product Quantity Type</label>
                                    <select class="form-select" id="product_quantity_type"
                                        name = "product_quantity_type">
                                        <option value="">Select Quantity Type Of Product</option>
                                        <option value="piece">Piece</option>
                                        <option value="kg">KG</option>
                                        <option value="litter">Litter</option>
                                        <option value="meter">Metter</option>
                                        <option value="litter$piece">Litter And Piece</option>
                                        <option value="kg$piece">KG And Piece</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Buy Price</label>
                                        <input type="email" class="form-control" id="product_buy_price"
                                            name="product_buy_price" placeholder="Buy Price">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Product Vat</label>
                                        <input type="email" class="form-control" id="product_vat"
                                            placeholder="Product Vat" name="product_vat">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Shipping Charge</label>
                                        <input type="email" class="form-control" id="product_shipping_const"
                                            placeholder="Product Vat" name="product_shipping_const">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Sell Price</label>
                                        <input type="email" class="form-control" id="product_sel_price"
                                            placeholder="Product Vat" name="product_sel_price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Discount Price</label>
                                        <input type="email" class="form-control" id="product_discount_price"
                                            placeholder="Product Vat" name="product_discount_price">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Event Price</label>
                                        <input type="email" class="form-control" id="product_event_price"
                                            placeholder="Product Vat" name="product_event_price">
                                    </div>


                                    <div class="col-12">
                                        <label for="inputProductCategory" class="form-label">Category</label>

                                        @php
                                            $all_category = App\Models\Category::where('category_status', 1)
                                                ->orderBy('category_name', 'ASC')
                                                ->get();
                                        @endphp

                                        <select class="form-select" id="inputProductCategory">

                                            @foreach ($all_category as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputProductSubcategory" class="form-label">Sub Category</label>

                                        <select class="form-select" id="inputProductSubcategory"
                                            name="inputProductSubcategory">

                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputbrand" class="form-label">Brand</label>
                                        <select class="form-select searchAndSelect" id="inputbrand">
                                            @php
                                                $all_brand = App\Models\Brand::where('brand_status', 1)
                                                    ->orderBy('brand_name', 'ASC')
                                                    ->get();
                                            @endphp
                                            <option value="">Select Brand</option>

                                            @foreach ($all_brand as $brand)
                                                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label">Vendor</label>
                                        <select class="form-select searchAndSelect" id="inputVendor">
                                            @php
                                                $all_vendor = App\Models\User::where('vendor_status_id', 1)
                                                    ->orderBy('vendor_shop_name', 'ASC')
                                                    ->get();
                                            @endphp
                                            <option value="">Select Vendor</option>

                                            @foreach ($all_vendor as $vendor)
                                                <option value="{{ $vendor->user_id }}">{{ $vendor->vendor_shop_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Product Supplyer</label>
                                        <select class="form-select" id="inputCollection">
                                            <option>Example 1</option>
                                            <option>Example 2</option>
                                            <option>Example 3</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="hot_deals"
                                                id="product_hot_deals">
                                            <label class="form-check-label" for="product_hot_deals">Hot Deals</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="featured_product"
                                                id="product_featured">
                                            <label class="form-check-label" for="product_featured">Featured
                                                Product</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="special_offer"
                                                id="special_offer">
                                            <label class="form-check-label" for="special_offer">Special Offer</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="special_deals"
                                                id="special_deals">
                                            <label class="form-check-label" for="special_deals">Special Deals</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="product_short_description" name="product_short_description"
                                class="form-label">Product Short Description</label>
                            <textarea class="form-control summernote" name="product_short_description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="product_long_description" name="product_long_description"
                                class="form-label">Product Long Description</label>
                            <textarea class="form-control summernote" name="product_long_description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="product_note" name="product_note" class="form-label">Product Note</label>
                            <textarea class="form-control summernote" name="product_note" rows="3"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputProductTitle" class="form-label">Main Thambnail</label>
                            <input name="product_thambnail" class="form-control" type="file" id="formFile"
                                onChange="mainThamUrl(this)">

                            <img class="my-3" src="" id="mainThmb" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputProductTitle" class="form-label">Multiple Image</label>
                            <input class="form-control" name="multi_img[]" type="file" id="multiImg"
                                multiple="">
                            <div class="row my-3" id="preview_img"></div>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="reset" class="btn btn-danger" id="admin_product_add_reset_btn" />
                    <button type="submit" class="btn btn-success" id="admin_product_add_btn">Upload Product</button>
                </div>


            </div><!--end row-->
        </div>
    </div>
    </div>

    </div>


    {{-- for sub category load  --}}
    <script>
        $(document).ready(function() {

            $('#inputProductCategory').on('change', function() {
                $category_id = $(this).val();
                if ($category_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/admin/find/subcategory') }}/" + $category_id,
                        // data: $category_id,
                        dataType: "json",
                        success: function(data) {
                            $inputProductSubcategory = $('#inputProductSubcategory').html('');
                            $('#inputProductSubcategory').empty();
                            $.each(data, function(indexInArray, valueOfElement) {
                                $inputProductSubcategory.append('<option value = "' +
                                    valueOfElement.sub_category_id + '">' +
                                    valueOfElement.sub_category_name + '</option>');
                                // console.log(valueOfElement.sub_category_id);
                            });
                        }
                    });
                }

            });

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
        // multi image preview
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                    img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
