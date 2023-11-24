
@extends('master')
@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> Create Shop
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">

                            @php

                                use App\Models\User;
                                $is_already_applyed = User::where('slug', $slug)->value('vendor_join');

                                $vendor_applyed_data = User::where('slug', $slug)->first();


                            @endphp

                            @if (!empty($is_already_applyed))

                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Already Requested Wating For Admin Aprove</h1>
                                    <p class="mb-30">Already have a shop? <a href="{{ route('login') }}">Login</a></p>
                                </div>
                            </div>
                            @else
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Create Your Shop</h1>
                                    <p class="mb-30">Already have a shop? <a href="{{ route('login') }}">Login</a></p>
                                </div>
                                <form method="POST" action="{{ route('vendor.apply.submit') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <input type="hidden" name="slug" value="{{$slug}}">
                                        <input class="form-control @error('vendor_shop_name')
                                            is-invalid
                                        @enderror" type="text"  id="vendor_shop_name" name="vendor_shop_name" placeholder="Your Shop Name" value="{{old('vendor_shop_name')}}" />

                                        @error('vendor_shop_name')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control @error('vendor_pay_of_line')
                                            is-invalid
                                        @enderror" type="text"  id="vendor_pay_of_line" name="vendor_pay_of_line" placeholder="Your Shop Title" value="{{old('vendor_pay_of_line')}}" />

                                        @error('vendor_pay_of_line')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control @error('vendor_short_description')
                                            is-invalid
                                        @enderror" type="text"  id="vendor_short_description" name="vendor_short_description" placeholder="Short Description About Your Shop" value="{{old('vendor_short_description')}}" />

                                        @error('vendor_short_description')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control @error('vendor_shop_address')
                                            is-invalid
                                        @enderror" type="text"  id="vendor_shop_address" name="vendor_shop_address" placeholder="Your Physical Address" value="{{old('vendor_shop_address')}}" />

                                        @error('vendor_shop_address')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="vendor_profile_pic">Shop Profile Image</label>
                                        <input class="form-control @error('vendor_profile_pic')
                                        is-invalid
                                    @enderror" type="file"  name="vendor_profile_pic" id="vendor_profile_pic"/>
                                        @error('vendor_profile_pic')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>

                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                        </div>
                                        <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                    </div>
                                    <div class="form-group mb-30">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Create Shop</button>
                                    </div>
                                    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection















