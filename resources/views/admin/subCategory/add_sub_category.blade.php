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
                        <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
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

                            <div class="card-header">
                                <h4>Add Sub Category Information</h4>
                            </div>
                            <form action="{{ route('admin.sub.category.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <input type="text"
                                                class="form-control @error('sub_category_name') is-invalid @enderror"
                                                id="sub_category_name" name="sub_category_name"
                                                value="{{ old('sub_category_name') }}" />

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
                                                name="category_id">

                                                @php
                                                    $all = App\Models\Category::all();
                                                @endphp

                                                <option value="">Select Category</option>
                                                @foreach ($all as $item)
                                                    <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                                @endforeach
                                            </select>

                                            @error('category_id')
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
                                                class="form-control @error('sub_category_image') is-invalid @enderror"
                                                id="sub_category_image" name="sub_category_image" />
                                            @error('sub_category_image')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <input type="reset" class="btn btn-info"></input>
                                        <button type="submit" class="btn btn-success">Save</button>
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
