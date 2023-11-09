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
                    <div class="col-lg-6 pr-30 d-none d-lg-block">
                        <img class="border-radius-15" src="{{asset('frontend')}}/assets/imgs/page/login-1.png" alt="" />
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h1 class="mb-5">Login</h1>
                                    <p class="mb-30">Don't have an account? <a href="{{route('register')}}">Create here</a></p>
                                </div>
                                <form method="POST" action="{{ route('loginStore') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control @error('email')
                                            is-invalid
                                        @enderror" type="email"  id="email" name="email" placeholder="Your Email *" />
                                        @error('email')
                                            <strong class="text-danger" role="alert">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control  @error('email')
                                        is-invalid
                                    @enderror" id="password" type="password" name="password" placeholder="Your password *" />
                                        @error('password')
                                            <strong class="text-danger" role="alert">{{$message}}</strong>
                                        @enderror
                                    </div>

                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        {{-- <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a> --}}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->

@endsection
