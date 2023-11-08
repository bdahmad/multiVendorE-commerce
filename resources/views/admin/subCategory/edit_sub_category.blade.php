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
                        <li class="breadcrumb-item active" aria-current="page">Sub Category Information</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.all.sub.category') }}" type="button" class="btn btn-primary">All Sub Category</a>
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
                                <h5>Sub Category Information</h5>
                            </div>
                            <form action="{{ route('admin.sub.category.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <input type="text"
                                                class="form-control @error('sub_category_name') is-invalid @enderror"
                                                id="sub_category_name" name="sub_category_name"
                                                value="@if ($data->sub_category_name) {{ $data->sub_category_name }}@else{{ old('sub_category_name') }} @endif"
                                                onkeydown="show_sub_category_update_button()" />
                                            @error('sub_category_name')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Category Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="category_id" onclick="show_sub_category_update_button()">

                                                @php
                                                    $all = App\Models\Category::all();
                                                @endphp

                                                <option value="">Select Category</option>
                                                @foreach ($all as $item)
                                                    <option value="{{ $item->id }}"@if ($item->id == $data->category_id) selected @endif>{{ $item->category_name }}</option>
                                                @endforeach
                                            </select>

                                            @error('category_id')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Sub Category Status</h6>
                                        </div>


                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select mb-3" aria-label="Default select example" name="sub_category_status" onclick="show_sub_category_update_button()">

                                                @php
                                                    $all = App\Models\Status::all();
                                                @endphp

                                                <option value="">Select Status</option>
                                                @foreach ($all as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $data->sub_category_status) selected @endif>
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
                                                class="form-control @error('sub_category_image') is-invalid @enderror"
                                                id="sub_category_image" name="sub_category_image"
                                                onchange="show_sub_category_update_button()" />
                                            @error('sub_category_image')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img src="{{ asset('uploads/subCategory/' . $data->sub_category_image) }}" alt=""
                                                style="width: 150px">
                                        </div>

                                    </div>

                                    <div class="mb-3 mt-3" id="sub_category_data_update_btn_block" style="display: none">
                                        <input type="reset" class="btn btn-info" id="sub_category_data_reset_btn"></input>
                                        <button type="submit" class="btn btn-success" id="sub_category_data_update_btn">Save
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
