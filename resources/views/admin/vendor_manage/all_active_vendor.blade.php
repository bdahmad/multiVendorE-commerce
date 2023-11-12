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
                        <li class="breadcrumb-item active" aria-current="page">Vendor</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.add.brand') }}" type="button" class="btn btn-primary">All Active Vendor</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">All Active Vendor</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL:</th>
                                <th>Shop Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Review</th>
                                <th>Shop Profile Pic</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_vendor as $key => $vendor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $vendor->vendor_shop_name }}</td>
                                    <td>{{ $vendor->username }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td>{{ $vendor->phone }}</td>
                                    <td>
                                        <?php
                                            for ($i=1; $i <= $vendor->vendor_avg_review ; $i++) {
                                            ?>
                                            <span><i class="fa fa-star"></i></span>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td><img src="{{ asset('uploads/vendor/' . $vendor->vendor_profile_pic) }}" alt="Brand Image"
                                            style="width: 60px; height: 60px"></td>
                                    <td>
                                        <a href="{{ route('admin.brand.edit', $vendor->slug) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('admin.brand.edit', $vendor->slug) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-eye "></i></a>
                                        <a href="{{ route('admin.brand.delete', $vendor->slug) }}"
                                            class="btn btn-info btn-sm " id="delete"><i class="fa fa-trash "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL:</th>
                                <th>Name</th>
                                <th>Offical Email</th>
                                <th>Offical Phone</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>>
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
