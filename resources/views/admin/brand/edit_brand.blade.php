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
                        <li class="breadcrumb-item active" aria-current="page">Brand Information</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.all.brand') }}" type="button" class="btn btn-primary">All Brand</a>
                </div>
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
                                <h5>Brand Information</h5>
                            </div>
                            <form action="{{ route('admin.brand.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <input type="text"
                                                class="form-control @error('brand_name') is-invalid @enderror"
                                                id="brand_name" name="brand_name"
                                                value="@if ($data->brand_name) {{ $data->brand_name }}@else{{ old('brand_name') }} @endif"
                                                onkeydown="show_brand_update_button()" />
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
                                                value="@if ($data->brand_pay_of_line) {{ $data->brand_pay_of_line }}@else{{ old('brand_pay_of_line') }} @endif"
                                                onkeydown="show_brand_update_button()" />

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
                                                id="brand_title" name="brand_title"
                                                value="@if ($data->brand_title) {{ $data->brand_title }}@else{{ old('brand_title') }} @endif"
                                                onkeydown="show_brand_update_button()" />

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
                                                value="@if ($data->brand_description) {{ $data->brand_description }}@else{{ old('brand_description') }} @endif"
                                                onkeydown="show_brand_update_button()" />

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
                                                id="brand_official_email" name="brand_official_email"
                                                value="@if ($data->brand_official_email) {{ $data->brand_official_email }}@else{{ old('brand_official_email') }} @endif"
                                                onkeydown="show_brand_update_button()" />
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
                                                id="brand_official_phone" name="brand_official_phone"
                                                value="@if ($data->brand_official_phone) {{ $data->brand_official_phone }}@else{{ old('brand_official_phone') }} @endif"
                                                onkeydown="show_brand_update_button()" />
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
                                                id="brand_official_address" name="brand_official_address"
                                                value="@if ($data->brand_official_address) {{ $data->brand_official_address }}@else{{ old('brand_official_address') }} @endif"
                                                onkeydown="show_brand_update_button()" />
                                            @error('brand_official_address')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Brand Status</h6>
                                        </div>


                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example" name="brand_status" onclick="show_brand_update_button()">

                                                @php
                                                    $all = App\Models\Status::all();
                                                @endphp

                                                <option value="">Select Status</option>
                                                @foreach ($all as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $data->brand_status) selected @endif>
                                                        {{ $item->status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Image</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="file"
                                                class="form-control @error('brand_image') is-invalid @enderror"
                                                id="brand_image" name="brand_image"
                                                onchange="show_brand_update_button()" />
                                            @error('brand_image')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img src="{{ asset('uploads/brand/' . $data->brand_image) }}" alt=""
                                                style="width: 150px">
                                        </div>

                                    </div>

                                    <div class="mb-3 mt-3" id="brand_data_update_btn_block" style="display: none">
                                        <input type="reset" class="btn btn-info" id="brand_data_reset_btn"></input>
                                        <button type="submit" class="btn btn-success" id="brand_data_update_btn">Save
                                            Change</button>
                                    </div>
                                </div>
                            </form>

                            <div class="card-footer fs-6">
                                <tr>
                                    <td>Creator</td>
                                    <td> : </td>
                                    <td>
                                        {{$data->creatorInfo->name}}<br>
                                        {{$data->created_at->format('d-m-Y | h:i:s A')}}
                                      </td>
                                </tr>

                                @if ($data->editorInfo != '')
                                <hr>
                                <tr>
                                    <td>Editor</td>
                                    <td> : </td>
                                    <td>
                                        {{$data->editorInfo->name}}<br>
                                        {{$data->updated_at->format('d-m-Y | h:i:s A')}}
                                      </td>
                                </tr>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
