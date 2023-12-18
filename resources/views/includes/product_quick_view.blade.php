<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">

                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend')}}/assets/imgs/shop/product-16-2.jpg" alt="product image" />
                                </figure>

                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend')}}/assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend')}}/assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend')}}/assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend')}}/assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend')}}/assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{asset('frontend')}}/assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">

                                <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Stock</span>
                            <h4 class="title-detail"><a href="shop-product-right.html" class="text-heading" id="product_name"></a></h4>

                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>


                            <div class="attr-detail attr-size mb-30" id="product_color_area">
                                <strong class="mr-10" style="width:50px;">Color : </strong>
                                <select class="form-control unicase-form-control" id="product_color" name="color">

                                </select>
                            </div>

                            <div class="attr-detail attr-size" id="product_size_area">
                                <strong class="mr-10" style="width:50px;">Size : </strong>
                                <select class="form-control unicase-form-control" id="product_color" name="size">

                                </select>
                            </div>


                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Quantity Type: </strong>
                                <span class="fs-5" id="product_quantity_type"></span>
                            </div>

                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand" id="product_descount_price"></span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15" id="discount"></span>
                                        <span class="old-price font-md ml-15" id="product_sel_price"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="number" name="quantity" id="quantity" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" id="product_id">
                                    <button type="submit" class="button button-add-to-cart" onclick="addToCart()"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="font-xs">
                                        <ul>
                                            <li class="mb-5">Vendor: <span class="text-brand " id="vendor_shop_name"> </span></li>
                                            <li class="mb-5">Code:<span class="text-brand" id="product_code"> </span></li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="font-xs">
                                        <ul>
                                            <li class="mb-5">Brand: <span class="text-brand" id="brand"> </span></li>
                                            <li class="mb-5">Category:<span class="text-brand" id="category"> </span></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
