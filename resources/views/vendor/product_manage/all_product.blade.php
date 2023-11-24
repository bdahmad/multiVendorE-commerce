@extends('vendor.vendor_master')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('vendor.add.product') }}" type="button" class="btn btn-primary">Add New Product</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">All Products</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL:</th>
                                <th>Product Name</th>
                                {{-- <th>Category</th> --}}
                                <th>Subategory</th>
                                <th>Price</th>
                                <th>Review</th>
                                <th>Admin Status</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    {{-- <td>{{ $item->categoryInfo->category_name }}</td> --}}
                                    <td>{{ $item->subcategoryInfo->sub_category_name }}</td>
                                    <td>{{ $item->product_sel_price}}</td>
                                    <td>
                                        <?php
                                            for ($i=1; $i <= $item->product_avg_review ; $i++) {
                                            ?>
                                            <span><i class="fa fa-star"></i></span>
                                        <?php
                                            }
                                        ?>
                                    </td>

                                    <td>
                                        @if ($item->product_status_id == 1)

                                            <span class="badge rounded-pill text-white bg-warning " style="font-size: 12px">Active</span>

                                        @elseif ($item->product_status_id == 2)
                                            <span class="badge rounded-pill text-white bg-danger " style="font-size: 12px">Processing</span>
                                        @else
                                            <span class="badge rounded-pill text-white bg-danger " style="font-size: 12px">Inactive</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($item->product_vendor_status_id == 1)
                                            <span class="badge rounded-pill text-white bg-warning " style="font-size: 12px">Active</span>
                                        @else
                                            <span class="badge rounded-pill text-white bg-danger " style="font-size: 12px">Inactive</span>
                                        @endif

                                    </td>
                                    <td><img src="{{ asset('uploads/product/' . $item->product_thumbnail) }}" alt="product Image"
                                            style="width: 60px; height: 60px"></td>
                                    <td>
                                        <a href="{{ route('vendor.product.edit', $item->product_slug) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('vendor.product.edit', $item->product_slug) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-eye "></i></a>

                                        @if ($item->product_vendor_status_id == 1 )
                                            <a href="{{ route('vendor.inactive.product', $item->product_slug) }}"
                                                class="btn btn-info btn-sm "><i class="fa fa-lock "></i></a>
                                        @else
                                        <a href="{{ route('vendor.active.product', $item->product_slug) }}"
                                            class="btn btn-info btn-sm "><i class="fa fa-unlock "></i></a>
                                        @endif


                                        <a href="{{ route('vendor.product.delete', $item->product_slug) }}"
                                            class="btn btn-info btn-sm " id="delete"><i class="fa fa-trash "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL:</th>
                                <th>Product Name</th>
                                {{-- <th>Category</th> --}}
                                <th>Subategory</th>
                                <th>Price</th>
                                <th>Review</th>
                                <th>Admin Status</th>
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

    <script>

    </script>
@endsection
