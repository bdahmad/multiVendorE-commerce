@extends('admin.admin_master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
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
                            {{-- <div class="text-end">
                                <i class="fa fa-pencil btn btn-info m-2" style="font-size: larger" id="input_toggle_btn" onclick="edit_form()"></i>
                            </div> --}}
                            <div class="card-header">
                                <h4>Add Brand Information</h4>
                            </div>
                            <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('brand_name') is-invalid @enderror"
                                                id="brand_name" name="brand_name" value="{{ old('brand_name') }}" />

                                            @error('brand_name')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Pay Of Line:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('brand_pay_of_line') is-invalid @enderror"
                                                id="brand_pay_of_line" name="brand_pay_of_line"
                                                value="{{ old('brand_pay_of_line') }}" />

                                            @error('brand_pay_of_line')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Title:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('brand_title') is-invalid @enderror"
                                                id="brand_title" name="brand_title" value="{{ old('brand_title') }}" />

                                            @error('brand_title')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Desctiption:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('brand_description') is-invalid @enderror"
                                                id="brand_description" name="brand_description"
                                                value="{{ old('brand_description') }}" />

                                            @error('brand_description')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Official Email:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="email"
                                                class="form-control @error('brand_official_email') is-invalid @enderror"
                                                id="brand_official_email" name="brand_official_email" value="{{old('brand_official_email')}}"/>
                                            @error('brand_official_email')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('brand_official_phone') is-invalid @enderror"
                                                id="brand_official_phone" name="brand_official_phone" value="{{old('brand_official_phone')}}"/>
                                            @error('brand_official_phone')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('brand_official_address') is-invalid @enderror"
                                                id="brand_official_address" name="brand_official_address" value="{{old('brand_official_address')}}"/>
                                            @error('brand_official_address')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Image</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="file"
                                                class="form-control @error('brand_image') is-invalid @enderror"
                                                id="brand_image" name="brand_image" />
                                            @error('brand_image')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3" >
                                        <input type="reset" class="btn btn-info" id="admin_data_reset_btn"></input>
                                        <button type="submit" class="btn btn-success" id="admin_data_update_btn">Save</button>
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
