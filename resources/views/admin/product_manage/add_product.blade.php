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
        <form action="{{route('admin.store.product')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr/>
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="form-group mb-3 ">
                                    <label for="product_name" na class="form-label">Product Name</label>
                                    <input type="text" class="form-control @error('product_name')
                                        is-invalid
                                    @enderror" id="product_name" name="product_name"
                                        placeholder="Enter Product Name" value="{{old('product_name')}}">
                                        @error('product_name')
                                            <span class="text-danger"></span>{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product_size" na class="form-label">Product Size</label>
                                    <input type="text" class="form-control visually-hidden" id="product_size"
                                        name="product_size" data-role="tagsinput" placeholder="S, M, L, Xl, XXL, 3XL" value="{{old('product_size')}}">

                                </div>

                                <div class="mb-3">
                                    <label for="product_color" na class="form-label">Product Color</label>
                                    <input type="text" class="form-control visually-hidden" id="product_color"
                                        name="product_color" data-role="tagsinput"
                                        placeholder="Red, White, Black, Blue, Purpel, Pink" value="{{old('product_color')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="product_materials" na class="form-label">Product Materials</label>
                                    <input type="text" class="form-control visually-hidden" id="product_materials"
                                        name="product_materials" data-role="tagsinput" placeholder="Cutton, Fiber" value="{{old('product_materials')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="product_tags" na class="form-label">Product Tag</label>
                                    <input type="text" class="form-control visually-hidden" id="product_tags"
                                        name="product_tags" data-role="tagsinput" placeholder="New Product, Top Product, Hot Product" value="{{old('product_tags')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="product_quality_tag" na class="form-label">Product Quality Tag</label>
                                    <input type="text" class="form-control visually-hidden" id="product_quality_tag"
                                        name="product_quality_tag" data-role="tagsinput" placeholder="Regular, Premium" value="{{old('product_quality_tag')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="product_weight" na class="form-label">Product Weight</label>
                                    <input type="text" class="form-control visually-hidden @error('product_weight')
                                        is-invalid
                                    @enderror" id="product_weight"
                                        name="product_weight" data-role="tagsinput" placeholder="250gm, 500gm, 1kg, 5kg, 10kg" value="{{old('product_weight')}}">
                                    @error('product_weight')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product_dimensions" na class="form-label">Product Dimensions</label>
                                    <input type="text" class="form-control visually-hidden" id="product_dimensions"
                                        name="product_dimensions" data-role="tagsinput"
                                        placeholder="6.65 x 3.01 x 0.35 in, 7.65 x 4.01 x 0.70 in" value="{{old('product_dimensions')}}">
                                </div>

                                <div class="mb-3">
                                    <label for="product_quantity_type" na class="form-label">Product Quantity Type</label>
                                    <select class="form-select @error('product_quantity_type')
                                        is-invalid
                                    @enderror" id="product_quantity_type"
                                        name = "product_quantity_type">
                                        <option value="">Select Quantity Type Of Product</option>
                                        <option value="piece">Piece</option>
                                        <option value="kg">KG</option>
                                        <option value="litter">Litter</option>
                                        <option value="meter">Metter</option>
                                        <option value="litter$piece">Litter And Piece</option>
                                        <option value="kg$piece">KG And Piece</option>
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
                                            name="product_buy_price" placeholder="500" value="{{old('product_buy_price')}}">
                                        @error('product_buy_price')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Product Vat</label>
                                        <input type="number" class="form-control @error('product_vat')
                                            is-invalid
                                        @enderror" id="product_vat"
                                            placeholder="10%" name="product_vat" value="{{old('product_vat')}}">
                                        @error('product_vat')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Shipping Charge</label>
                                        <input type="number" class="form-control @error('product_shipping_const')
                                            is-invalid
                                        @enderror" id="product_shipping_const"
                                            placeholder="100" name="product_shipping_const" value="{{old('product_shipping_const')}}">
                                            @error('product_shipping_const')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Sell Price</label>
                                        <input type="number" class="form-control @error('product_sel_price')
                                            is-invalid
                                        @enderror" id="product_sel_price"
                                            placeholder="800" name="product_sel_price" value="{{old('product_sel_price')}}">
                                            @error('product_sel_price')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Discount Price</label>
                                        <input type="number" class="form-control" id="product_discount_price"
                                            placeholder="10%" name="product_discount_price" value="{{old('product_discount_price')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Event Price</label>
                                        <input type="number" class="form-control" id="product_event_price"
                                            placeholder="700" name="product_event_price" value="{{old('product_event_price')}}">
                                    </div>


                                    <div class="col-12">
                                        <label for="category_id" class="form-label">Category</label>

                                        @php
                                            $all_category = App\Models\Category::where('category_status', 1)
                                                ->orderBy('category_name', 'ASC')
                                                ->get();
                                        @endphp

                                        <select class="form-select @error('category_id')
                                            is-invalid
                                        @enderror" id="category_id" name="category_id">

                                            @foreach ($all_category as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="sub_category_id" class="form-label">Sub Category</label>

                                        <select class="form-select @error('sub_category_id')
                                            is-invalid
                                        @enderror" id="sub_category_id"
                                            name="sub_category_id">

                                        </select>
                                        @error('sub_category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="inputbrand" class="form-label">Brand</label>
                                        <select class="form-select searchAndSelect" id="inputbrand" name="brand_id">
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
                                        <select class="form-select searchAndSelect" id="inputVendor" name="vendor_id">
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

                        <div class="mb-3 mt-3 ">
                            <label for="product_short_description" name="product_short_description"
                                class="form-label">Product Short Description</label>
                            <textarea class="form-control summernote @error('product_short_description')
                            is-invalid
                            @enderror" name="product_short_description" rows="3">{{old('product_short_description')}}</textarea>

                            @error('product_short_description')
                                <span class="text-white bg-dark">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_long_description" name="product_long_description"
                                class="form-label">Product Long Description</label>
                            <textarea class="form-control summernote @error('product_long_description')
                                is-invalid
                            @enderror" name="product_long_description" rows="3">{{old('product_long_description')}}</textarea>

                            @error('product_long_description')
                                <span class="text-white bg-dark">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="product_note" name="product_note" class="form-label">Product Note</label>
                            <textarea class="form-control summernote @error('product_note')
                                is-invalid
                            @enderror" name="product_note" rows="3">{{old('product_note')}}</textarea>
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
                            <img class="my-3" src="" id="mainThmb" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputProductTitle" class="form-label">Multiple Image</label>
                            <input class="form-control @error('product_multi_image')
                                is-invalid
                            @enderror" name="product_multi_image[]" type="file" id="multiImg"
                                multiple="" max="5">
                                @error('product_multi_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            <div class="row my-3" id="preview_img"></div>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="reset" class="btn btn-danger" id="admin_product_add_reset_btn" />
                    <button type="submit" class="btn btn-success" id="admin_product_add_btn">Upload Product</button>
                </div>
            </div><!--end row-->
        </form>
        </div>
    </div>
    </div>

    </div>


    {{-- for sub category load  --}}
    <script>
        $(document).ready(function() {

            $('#category_id').on('change', function() {
                $category_id = $(this).val();
                if ($category_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/admin/find/subcategory') }}/" + $category_id,
                        // data: $category_id,
                        dataType: "json",
                        success: function(data) {
                            $inputProductSubcategory = $('#sub_category_id').html('');
                            $('#sub_category_id').empty();
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
