
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('admin')}}/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('admin')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('admin')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('admin')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('admin')}}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('admin')}}/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('admin')}}/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('admin')}}/assets/css/app.css" rel="stylesheet">
	<link href="{{asset('admin')}}/assets/css/icons.css" rel="stylesheet">
	<title>Rukada - Responsive Bootstrap 5 Admin Template</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="{{asset('admin')}}/assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Sign in</h3>
                                            <p>Don't have an account yet? <a href="authentication-signup.html">Sign up here</a>
                                            </p>
                                        </div>
                                        {{-- <div class="d-grid">
                                            <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="{{asset('admin')}}/assets/images/icons/search.svg" width="16" alt="Image Description">
                                                <span>Sign in with Google</span>
                                                </span>
                                            </a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
                                        </div> --}}
                                        <div class="login-separater text-center mb-4"> <span>SIGN IN WITH EMAIL Or Username</span>
                                            <hr/>
                                        </div>
                                        <div class="form-body">
                                            <form class="row g-3">
                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
                                                </div>
                                                <div class="col-12">
                                                    <label for="password" class="form-label">Enter Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0" id="password" placeholder="Enter Password" name="password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </form>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{asset('admin')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('admin')}}/assets/js/jquery.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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
	<script src="{{asset('admin')}}/assets/js/app.js"></script>
</body>

</html>





{{--

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
