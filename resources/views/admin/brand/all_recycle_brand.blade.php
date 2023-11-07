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
                        <li class="breadcrumb-item active" aria-current="page">Brand</li>
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
        <h6 class="mb-0 text-uppercase">All Brand Information</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL:</th>
                                <th>Name</th>
                                <th>Offical Email</th>
                                <th>Offical Phone</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->brand_name }}</td>
                                    <td>{{ $item->brand_official_email }}</td>
                                    <td>{{ $item->brand_official_phone }}</td>
                                    <td>{{ $item->statusInfo->status_name }}</td>
                                    <td><img src="{{ asset('uploads/brand/' . $item->brand_image) }}" alt="Brand Image"
                                            style="width: 60px; height: 60px"></td>
                                    <td>

                                        <a href="{{ route('admin.brand.restore', $item->brand_slug) }}"
                                            class="btn btn-info btn-sm " id="restore"><i class="fa fa-refresh "></i></a>

                                        <a href="{{ route('admin.brand.permanentlyDelete', $item->brand_slug) }}"
                                            class="btn btn-info btn-sm " id="permanentlyDelete"><i class="fa fa-trash "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>

    </script>
@endsection
