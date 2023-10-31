@extends('vendor.vendor_master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">

                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert" >
                                    {{Session::get('error')}}
                                </div>
                            @endif

                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <form action="{{ route('vendor.password.update') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    {{-- old password  --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Old Password:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                id="old_password" name="old_password" />

                                            @error('old_password')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- new password  --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">New Password:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password" name="new_password" />

                                            @error('new_password')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- confirm password  --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Confirm Password:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password"
                                                class="form-control @error('confirm_password') is-invalid @enderror"
                                                id="confirm_password" name="confirm_password" />

                                            @error('confirm_password')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <input type="reset" class="btn btn-info btn-sm" />
                                        <button type="submit" class="btn btn-success btn-sm" id="vendor_password_change">Change
                                            Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
