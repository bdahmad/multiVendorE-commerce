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
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">

                                    <div id="vendor_img_block">
                                        <img id="vendor_img"
                                            src="{{ !empty($vendorData->vendor_profile_pic) ? url('uploads/vendor/' . $vendorData->vendor_profile_pic) : url('uploads/no_image.jpg') }}"
                                            alt="vendor" class="rounded-circle p-1 bg-primary" width="110">

                                        <div id="vendor_img_overlay">
                                            <a href="" type="button" data-bs-toggle="modal"
                                                data-bs-target="#vendorPhotoInput" id="vendor_pic_edit_btn"><i
                                                class="fa fa-camera">Edit</i></a>
                                        </div>
                                    </div>


                                    {{-- photo upload modal  --}}
                                    <div class="modal fade" id="vendorPhotoInput" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="vendorPhotoInputLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="vendorPhotoInputLabel">Choose Your Shop
                                                        Photo
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('vendor.profile.pic.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <input type="file" name="vendor_profile_pic" id="vendor_photo">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <h4>{{ $vendorData->vendor_shop_name }}</h4>
                                        <h6 class="text-secondary mb-1">{{ $vendorData->vendor_pay_of_line }}</h6>
                                        <div class="text-secondary my-3">
                                            <?php
                                                for ($i=0; $i <$vendorData->vendor_avg_review ; $i++) {
                                            ?>
                                                    <i class="fa fa-star fs-5" aria-hidden="true"></i>

                                            <?php
                                                }
                                            ?>
                                        </div>
                                        {{-- <h4 class="text-secondary my-3">{{ $vendorData->vendor_avg_review }}</h4> --}}
                                        <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>

                                </div>
                                <hr class="my-4" />
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><i class="fa fa-globe fs-5 ms-1"></i> Website</h6>
                                        <span class="text-secondary">https://codervent.com</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><i class="fa fa-globe fs-5 ms-1"></i> Website</h6>
                                        <span class="text-secondary">https://codervent.com</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><i class="fa fa-globe fs-5 ms-1"></i> Website</h6>
                                        <span class="text-secondary">https://codervent.com</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><i class="fa fa-globe fs-5 ms-1"></i> Website</h6>
                                        <span class="text-secondary">https://codervent.com</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            {{-- <div class="text-end">
                                <i class="fa fa-pencil btn btn-info m-2" style="font-size: larger" id="input_toggle_btn" onclick="edit_form()"></i>
                            </div> --}}
                            <form action="{{ route('vendor.profile.update') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Shop Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "vendor_data_show">{{$vendorData->name}}</h6> --}}
                                            <input type="text" class="form-control @error('vendor_shop_name') is-invalid @enderror"
                                                id="name" name="vendor_shop_name"
                                                value="@if ($vendorData->vendor_shop_name) {{ $vendorData->vendor_shop_name }}@else{{ old('vendor_shop_name') }} @endif"
                                                onkeydown="show_vendor_update_button()" />

                                            @error('vendor_shop_name')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Pay Of Line:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "vendor_data_show">{{$vendorData->pay_of_line}}</h6> --}}
                                            <input type="text"
                                                class="form-control @error('vendor_pay_of_line') is-invalid @enderror"
                                                id="vendor_pay_of_line" name="vendor_pay_of_line"
                                                value="@if ($vendorData->vendor_pay_of_line) {{ $vendorData->vendor_pay_of_line }}@else{{ old('vendor_pay_of_line') }} @endif"
                                                onkeydown="show_vendor_update_button()" />

                                            @error('vendor_pay_of_line')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Short Description:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea class="form-control" id="vendor_short_description"  rows="3" name="vendor_short_description" onkeydown="show_vendor_update_button()">{{$vendorData->vendor_short_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "vendor_data_show" for="">{{$vendorData->email}}</h6> --}}
                                            <input type="text"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email"
                                                value="@if ($vendorData->email) {{ $vendorData->email }}@else{{ old('email') }} @endif"
                                                onkeydown="show_vendor_update_button()" />
                                            @error('email')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "vendor_data_show" for="">{{$vendorData->phone}}</h6> --}}
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                name="phone"
                                                value="@if ($vendorData->phone) {{ $vendorData->phone }}@else{{ old('phone') }} @endif"
                                                onkeydown="show_vendor_update_button()" />
                                            @error('phone')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Username</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 class = "vendor_data_show" for="">{{ $vendorData->username }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Vendor Join</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 class = "vendor_data_show" for="">{{ $vendorData->vendor_join }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "vendor_data_show" for="">{{$vendorData->address}}</h6> --}}
                                            <input type="text"
                                                class="form-control @error('vendor_shop_address') is-invalid @enderror" id="vendor_shop_address"
                                                name="vendor_shop_address"
                                                value="@if ($vendorData->vendor_shop_address) {{ $vendorData->vendor_shop_address }}@else{{ old('vendor_shop_address') }} @endif"
                                                onkeydown="show_vendor_update_button()" />
                                            @error('vendor_shop_address')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3" id="vendor_data_update_btn_block" style="display: none">
                                        <input type="reset" class="btn btn-info" id="vendor_data_reset_btn"></input>
                                        <button type="submit" class="btn btn-success" id="vendor_data_update_btn">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                    <p>Web Design</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Website Markup</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>One Page</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Mobile Template</p>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Backend API</p>
                                    <div class="progress" style="height: 5px">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
