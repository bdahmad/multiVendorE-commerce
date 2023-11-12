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
                        <li class="breadcrumb-item active" aria-current="page">Vendor Information</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.all.requested.vendor') }}" type="button" class="btn btn-primary">All Requested
                        Vendor</a>
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
                                <h5>Vendor Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Shop Name:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="mb-0">{{ $vendor->vendor_shop_name }}</h6>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Username:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="mb-0">{{ $vendor->username }}</h6>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Email:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="mb-0">{{ $vendor->email }}</h6>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Phone:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="mb-0">{{ $vendor->phone }}</h6>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Shop Slug:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="mb-0">{{ $vendor->vendor_shop_slug }}</h6>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Shop Title:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <h6 class="mb-0">{{ $vendor->vendor_pay_of_line }}</h6>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Shop Description:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p class="mb-0 h6">{{ $vendor->vendor_short_description }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3 flex">
                                        <h6 class="mb-0">Requested Date:</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p class="mb-0 h6">{{ $vendor->vendor_join }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img src="{{ asset('uploads/vendor/' . $vendor->vendor_profile_pic) }}"
                                            alt="">
                                    </div>
                                </div>
                                <hr>

                                <div class="card-title my-4">
                                    <h5>Manage Shop Request</h5>
                                </div>

                                <form action="{{ route('admin.active.requested.vendor', $vendor->vendor_shop_slug) }}"
                                    method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Shop Status</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="vendor_status_id" onclick="show_brand_update_button()">

                                                @php
                                                    $all = App\Models\Status::all();
                                                @endphp

                                                <option value="">Select Shop Status</option>
                                                @foreach ($all as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $vendor->vendor_status_id) selected @endif>
                                                        {{ $item->status_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <input type="reset" class="btn btn-info"></input>
                                        <button type="submit" class="btn btn-success">Save Change</button>
                                    </div>
                                </form>


                            </div>

                            <div class="card-footer fs-6">
                                @if ($vendor->creatorInfo != '')
                                    <tr>
                                        <td>Creator</td>
                                        <td> : </td>
                                        <td>
                                            {{ $vendor->creatorInfo->name }}<br>
                                            {{ $vendor->created_at->format('d-m-Y | h:i:s A') }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($vendor->editorInfo != '')
                                    <hr>
                                    <tr>
                                        <td>Editor</td>
                                        <td> : </td>
                                        <td>
                                            {{ $vendor->editorInfo->name }}<br>
                                            {{ $vendor->updated_at->format('d-m-Y | h:i:s A') }}
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
