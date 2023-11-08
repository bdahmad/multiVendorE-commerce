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
                        <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
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
        <h6 class="mb-0 text-uppercase">All Sub Category Information</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL:</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->sub_category_name }}</td>
                                    <td>{{ $item->categoryInfo->category_name }}</td>
                                    <td>{{ $item->sub_category_slug }}</td>
                                    <td>{{ $item->statusInfo->status_name }}</td>
                                    <td><img src="{{ asset('uploads/subCategory/' . $item->sub_category_image) }}" alt="category Image"
                                            style="width: 60px; height: 60px"></td>
                                    <td>
                                        <a href="{{ route('admin.sub.category.restore', $item->sub_category_slug) }}"
                                            class="btn btn-info btn-sm " id="restore"><i class="fa fa-refresh "></i></a>

                                        <a href="{{ route('admin.sub.category.permanentlyDelete', $item->sub_category_slug) }}"
                                            class="btn btn-info btn-sm " id="permanentlyDelete"><i
                                                class="fa fa-trash "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL:</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <script></script>
@endsection
