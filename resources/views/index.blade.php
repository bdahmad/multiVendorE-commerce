@extends('master')
    @section('content')
        <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="home-slide-cover mt-30">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        <div class="single-hero-slider single-animation-wrap"
                            style="background-image: url({{ asset('frontend') }}/assets/imgs/slider/slider-1.png)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    Don’t miss amazing<br />
                                    grocery deals
                                </h1>
                                <p class="mb-65">Sign up for the daily newsletter</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="single-hero-slider single-animation-wrap"
                            style="background-image: url({{ asset('frontend') }}/assets/imgs/slider/slider-2.png)">
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    Fresh Vegetables<br />
                                    Big discount
                                </h1>
                                <p class="mb-65">Save up to 50% off on your first order</p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
        </section>
        <!--End hero slider-->

        <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>Featured Categories</h3>

                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                        id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns">

                        @php
                            $categories = App\Models\Category::where('category_status', 1)->get();
                        @endphp

                        @foreach ($categories as $category)

                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{route('categorywise.product', $category->category_slug)}}"><img
                                            src="{{asset('uploads/category/'.$category->category_image)}}"
                                            alt="" /></a>
                                </figure>
                                <h6><a href="{{route('categorywise.product', $category->category_slug)}}">{{$category->category_name}}</a></h6>
                                @php
                                    $categoryise__product = App\Models\Product::where('category_id', $category->category_id)->count();
                                @endphp
                                <span>{{$categoryise__product}}</span>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!--End category slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <img src="{{ asset('frontend') }}/assets/imgs/banner/banner-1.png" alt="" />
                            <div class="banner-text">
                                <h4>
                                    Everyday Fresh & <br />Clean with Our<br />
                                    Products
                                </h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('frontend') }}/assets/imgs/banner/banner-2.png" alt="" />
                            <div class="banner-text">
                                <h4>
                                    Make your Breakfast<br />
                                    Healthy and Easy
                                </h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <img src="{{ asset('frontend') }}/assets/imgs/banner/banner-3.png" alt="" />
                            <div class="banner-text">
                                <h4>The best Organic <br />Products Online</h4>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End banners-->



        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3> New Products </h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                aria-selected="true">All</button>
                        </li>

                        @foreach ($categories as $category)

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#category{{$category->category_id}}"
                                type="button" role="tab" aria-controls="{{$category->category_id}}" aria-selected="false">{{$category->category_name}}</a>
                        </li>
                        @endforeach


                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @php
                                $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->latest()->get()
                            @endphp
                            @foreach ($all_product as $item)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',$item->product_slug)}}">
                                                <img class="default-img"
                                                    src="{{ asset('uploads/product/'.$item->product_thumbnail) }}"
                                                    alt="" />

                                                @php
                                                    $first_milti_img = App\Models\ProductMultiImage::where('product_id', $item->product_id)->first();
                                                @endphp
                                                <img class="hover-img"
                                                    src="{{ asset('uploads/product/multi_image/'.$first_milti_img->product_multi_image) }}"
                                                    alt="" />
                                            </a>
                                        </div>

                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn"
                                                href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>

                                        @php
                                            $price = $item->product_sel_price - $item->product_discount_price;
                                            $discount = ($price / $item->product_sel_price) * 100 ;
                                        @endphp

                                        @if ($item->product_discount_price != null)

                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">{{round($discount)}} %</span>
                                            </div>

                                        @elseif($item->created_at->diffInDays(\Carbon\Carbon::now()) <= 30)

                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>

                                        </div>

                                        @else
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>

                                        @endif

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$item->categoryInfo->category_name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="vendor-details-1.html">
                                                    @if ($item->vendor_id != null)
                                                    {{$item->vendorInfo->vendor_shop_name}}
                                                    @else
                                                </a></span>
                                                    Admin
                                                    @endif
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{round($price)}}</span>
                                                <span class="old-price">{{round($item->product_sel_price)}}</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach

                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one-->

                    @foreach ($categories as $category)

                    <div class="tab-pane fade" id="category{{$category->category_id}}" role="tabpanel" aria-labelledby="{{$category->category_id}}">
                        <div class="row product-grid-4">

                        @php
                        $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('category_id', $category->category_id)->latest()->get();
                        @endphp
                        @foreach ($all_product as $item)
                        @php
                            $price = $item->product_sel_price - $item->product_discount_price;
                            $discount = ($price / $item->product_sel_price) * 100 ;
                        @endphp
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('product.details',$item->product_slug)}}">
                                            <img class="default-img"
                                                src="{{ asset('uploads/product/'.$item->product_thumbnail) }}"
                                                alt="" />

                                            @php
                                                $first_milti_img = App\Models\ProductMultiImage::where('product_id', $item->product_id)->first();
                                            @endphp
                                            <img class="hover-img"
                                                src="{{ asset('uploads/product/multi_image/'.$first_milti_img->product_multi_image) }}"
                                                alt="" />
                                        </a>
                                    </div>

                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn"
                                            href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                            data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div>

                                    @if ($item->product_discount_price != null)

                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">{{round($discount)}} %</span>
                                        </div>

                                    @elseif($item->created_at->diffInDays(\Carbon\Carbon::now()) <= 30)

                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">New</span>

                                    </div>

                                    @else
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>

                                    @endif

                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{$item->categoryInfo->category_name}}</a>
                                    </div>
                                    <h2><a href="{{route('product.details',$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">
                                            @if ($item->vendor_id != null)
                                            {{$item->vendorInfo->vendor_shop_name}}
                                            @else
                                        </a></span>
                                            Admin
                                            @endif
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>{{round($price)}}</span>
                                            <span class="old-price">{{round($item->product_sel_price)}}</span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                        @endforeach

                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two-->
                    @endforeach

                </div>
                <!--End tab-content-->
            </div>
        </section>
        <!--Products Tabs-->

        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class=""> Featured Products </h3>

                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100">Bring nature into your home</h2>
                                <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                        class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                                aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                        id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">

                                        @php
                                            $featuredproducts = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->whereNotNull('product_featured')->get();

                                        @endphp
                                        @foreach ($featuredproducts as $item)
                                        @php
                                            $price = $item->product_sel_price - $item->product_discount_price;
                                            $discount = ($price / $item->product_sel_price) * 100 ;
                                        @endphp
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{route('product.details',$item->product_slug)}}">
                                                        <img class="default-img"
                                                            src="{{ asset('uploads/product/'.$item->product_thumbnail) }}"
                                                            alt="" />

                                                        @php
                                                            $first_milti_img = App\Models\ProductMultiImage::where('product_id', $item->product_id)->first();
                                                        @endphp
                                                        <img class="hover-img"
                                                            src="{{ asset('uploads/product/multi_image/'.$first_milti_img->product_multi_image) }}"
                                                            alt="" />
                                                    </a>
                                                </div>

                                                <div class="product-action-1">
                                                    <a aria-label="Add To Wishlist" class="action-btn"
                                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                            class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                                </div>

                                                @if ($item->product_discount_price != null)

                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">{{round($discount)}} %</span>
                                                    </div>

                                                @elseif($item->created_at->diffInDays(\Carbon\Carbon::now()) <= 30)

                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">New</span>

                                                </div>

                                                @else
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>

                                                @endif
                                            </div>


                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="shop-grid-right.html">{{$item->categoryInfo->category_name}}</a>
                                                </div>
                                                <h2><a href="{{route('product.details',$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>

                                                <div class="product-price mt-10">
                                                    <span>{{round($price)}}</span>
                                                        <span class="old-price">{{round($item->product_sel_price)}}</span>
                                                </div>

                                                <div class="sold mt-15 mb-15">
                                                    <div class="progress mb-5">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 50%" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="font-xs text-heading"> Sold: 90/120</span>
                                                </div>

                                                <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                            </div>
                                        </div>
                                        <!--End product Wrap-->
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <!--End tab-pane-->


                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>
        <!--End Best Sales-->

        @foreach ($categories as $category)
        <!--  Category -->
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$category->category_name}}</h3>

                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel"
                        aria-labelledby="tab-one">
                        <div class="row product-grid-4">

                            @php
                            $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('category_id', $category->category_id)->latest()->get();
                            @endphp

                            @foreach ($all_product as $item)
                                @php
                                    $price = $item->product_sel_price - $item->product_discount_price;
                                    $discount = ($price / $item->product_sel_price) * 100 ;
                                @endphp

                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                    data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.details',$item->product_slug)}}">
                                                <img class="default-img"
                                                    src="{{ asset('uploads/product/'.$item->product_thumbnail) }}"
                                                    alt="" />

                                                @php
                                                    $first_milti_img = App\Models\ProductMultiImage::where('product_id', $item->product_id)->first();
                                                @endphp
                                                <img class="hover-img"
                                                    src="{{ asset('uploads/product/multi_image/'.$first_milti_img->product_multi_image) }}"
                                                    alt="" />
                                            </a>
                                        </div>

                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn"
                                                href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                    class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                                data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        </div>

                                        @php
                                            $price = $item->product_sel_price - $item->product_discount_price;
                                            $discount = ($price / $item->product_sel_price) * 100 ;
                                        @endphp

                                        @if ($item->product_discount_price != null)

                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">{{round($discount)}} %</span>
                                            </div>

                                        @elseif($item->created_at->diffInDays(\Carbon\Carbon::now()) <= 30)

                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">New</span>

                                        </div>

                                        @else
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>

                                        @endif

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$item->categoryInfo->category_name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',$item->product_slug)}}">{{$item->product_name}}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="vendor-details-1.html">
                                                    @if ($item->vendor_id != null)
                                                    {{$item->vendorInfo->vendor_shop_name}}
                                                    @else
                                                </a></span>
                                                    Admin
                                                    @endif
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>{{round($price)}}</span>
                                                <span class="old-price">{{round($item->product_sel_price)}}</span>
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->

                            @endforeach

                        </div>
                        <!--End product-grid-4-->
                    </div>


                </div>
                <!--End tab-content-->
            </div>


        </section>
        <!-- Category -->
        @endforeach


        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>

                        <div class="product-list-small animated animated">
                            @php
                            $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->whereNotNull('product_hot_deals')->latest()->take(3)->get();
                            @endphp
                            @foreach ($all_product as $item)
                            @php
                                $price = $item->product_sel_price - $item->product_discount_price;
                                $discount = ($price / $item->product_sel_price) * 100 ;
                            @endphp

                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img
                                            src="{{asset('uploads/product/'.$item->product_thumbnail)}}"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$item->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{round($price)}}</span>
                                        <span class="old-price">{{round($item->product_sel_price)}}</span>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated animated"> Special Offer </h4>
                        <div class="product-list-small animated animated">

                            @php
                            $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->whereNotNull('product_special_offer')->latest()->take(3)->get();
                            @endphp
                            @foreach ($all_product as $item)
                            @php
                                $price = $item->product_sel_price - $item->product_discount_price;
                                $discount = ($price / $item->product_sel_price) * 100 ;
                            @endphp

                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img
                                            src="{{asset('uploads/product/'.$item->product_thumbnail)}}"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$item->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{round($price)}}</span>
                                        <span class="old-price">{{round($item->product_sel_price)}}</span>
                                    </div>
                                </div>
                            </article>
                            @endforeach


                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                        <div class="product-list-small animated animated">


                            @php
                            $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->latest()->take(3)->get();
                            @endphp
                            @foreach ($all_product as $item)
                            @php
                                $price = $item->product_sel_price - $item->product_discount_price;
                                $discount = ($price / $item->product_sel_price) * 100 ;
                            @endphp

                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img
                                            src="{{asset('uploads/product/'.$item->product_thumbnail)}}"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$item->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{round($price)}}</span>
                                        <span class="old-price">{{round($item->product_sel_price)}}</span>
                                    </div>
                                </div>
                            </article>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                        <div class="product-list-small animated animated">

                            @php
                            $all_product = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->whereNotNull('product_special_deals')->latest()->take(3)->get();
                            @endphp
                            @foreach ($all_product as $item)
                            @php
                                $price = $item->product_sel_price - $item->product_discount_price;
                                $discount = ($price / $item->product_sel_price) * 100 ;
                            @endphp

                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html"><img
                                            src="{{asset('uploads/product/'.$item->product_thumbnail)}}"
                                            alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$item->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                        <span>{{round($price)}}</span>
                                        <span class="old-price">{{round($item->product_sel_price)}}</span>
                                    </div>
                                </div>
                            </article>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->

        <!--Vendor List -->
        <div class="container">

            <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                <h3 class="">All Our Vendor List </h3>
                <a class="show-all" href="shop-grid-right.html">
                    All Vendors
                    <i class="fi-rs-angle-right"></i>
                </a>
            </div>


            <div class="row vendor-grid">

                @php
                    $vendors = App\Models\User::where('role_id', 3)->where('vendor_status_id', 1)->latest()->get();
                @endphp

                @foreach ($vendors as $vendor)

                <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
                    <div class="vendor-wrap mb-40">
                        <div class="vendor-img-action-wrap">
                            <div class="vendor-img">
                                <a href="{{ route('vendor.details', $vendor->slug) }}">
                                    <img class="default-img"
                                        src="{{asset('uploads/vendor/'.$vendor->vendor_profile_pic)}}"
                                        alt="" />
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Mall</span>
                            </div>
                        </div>
                        <div class="vendor-content-wrap">
                            <div class="d-flex justify-content-between align-items-end mb-30">
                                <div>
                                    <div class="product-category">
                                        <span class="text-muted">Since {{ $vendor->vendor_join }}</span>
                                    </div>
                                    <h4 class="mb-5"><a href="{{ route('vendor.details', $vendor->slug) }}">{{$vendor->vendor_shop_name}}</a></h4>
                                    <div class="product-rate-cover">
                                        @php
                                            $product_count = App\Models\Product::where('product_status_id', 1)->where('product_vendor_status_id', 1)->where('vendor_id', $vendor->user_id)->count();
                                        @endphp
                                        <span class="font-small total-product">{{$product_count}} products</span>
                                    </div>
                                </div>

                            </div>
                            <div class="vendor-info mb-30">
                                <ul class="contact-infor text-muted">

                                    <li><img src="{{ asset('frontend') }}/assets/imgs/theme/icons/icon-contact.svg"
                                            alt="" /><strong>Call Us:</strong><span>{{$vendor->phone}}</span></li>
                                </ul>
                            </div>
                            <a href="{{ route('vendor.details', $vendor->slug) }}" class="btn btn-xs">Visit Store <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <!--end vendor card-->
                @endforeach

            </div>
        </div>
        <!--End Vendor List -->
    @endsection

