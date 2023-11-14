@extends('layouts.adminbackend')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a type="button" href="{{route('add-category')}}" class="btn btn-primary">Add Category</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <!-- <h6 class="mb-0 text-uppercase">DataTable Example</h6> -->
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->category_name}}</td>
                            <td>
                                <img src="{{asset('uploads/images/category/'.$data->category_image)}}" height="30px" width="30px" alt="">
                            </td>
                            <td>
                                <a href="{{route('edit-category',$data->category_slug)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{route('softDelete-category',$data->category_id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection