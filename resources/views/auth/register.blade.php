@extends('master')
@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
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
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Create an Account</h1>
                                    <p class="mb-30">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input class="form-control @error('name')
                                            is-invalid
                                        @enderror" type="text"  id="name" name="name" placeholder="name" value="{{old('name')}}" />

                                        @error('name')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('username')
                                            is-invalid
                                        @enderror" type="text"  id="username" name="username" placeholder="Username" value="{{old('username')}}" />

                                        @error('username')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('email')
                                            is-invalid
                                        @enderror" type="email"  name="email" id="email" placeholder="Email" value="{{old('email')}}"/>
                                        @error('email')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('phone')
                                            is-invalid
                                        @enderror" type="phone"  name="phone" id="phone" placeholder="Phone" value="{{old('phone')}}"/>
                                        @error('phone')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('password')
                                            is-invalid
                                        @enderror"  type="password" id="password" name="password" placeholder="Password" />
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('confirm_password')
                                            is-invalid
                                        @enderror"  type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" />

                                        @error('confirm_password')
                                            <span class="text-danger">{{$message}}</span>
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
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                    </div>
                                    <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <div class="card-login mt-115">
                            <a href="#" class="social-login facebook-login">
                                <img src="assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                <span>Continue with Facebook</span>
                            </a>
                            <a href="#" class="social-login google-login">
                                <img src="assets/imgs/theme/icons/logo-google.svg" alt="" />
                                <span>Continue with Google</span>
                            </a>
                            <a href="#" class="social-login apple-login">
                                <img src="assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                <span>Continue with Apple</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection















