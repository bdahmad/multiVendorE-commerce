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
            <div class="row">
                <div class="col-md-8">
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
                <div class="col-md-4">
                    <form method="post" action="{{ route('insert-category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Sub Category Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control @error('sub_category_name') is-invalid @enderror" value="{{old('sub_category_name')}}" name="sub_category_name" />
                                @error('sub_category_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Category Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @php
                                $categorys = App\Models\Backend\Category::where('category_status',1)->get();
                                @endphp
                                <select class="form-select" aria-label="Default select example">
                                    <option value="">Select Category</option>
                                    @foreach($categorys as $category)
                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('sub_category_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Sub Category Image</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="file" name="sub_category_image" class="form-control @error('sub_category_image') is-invalid @enderror" id="image" />
                                @error('sub_category_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <img src="{{url('uploads/no_image.jpg') }}" class="rounded-circle p-1 bg-primary" alt="Admin" style=" width: 100px; height: 100px;" id="showImg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <div class="row">
                    <div class="col-lg-10"> -->
                <form method="post" action="{{ route('insert-category') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Sub Category Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control @error('sub_category_name') is-invalid @enderror" value="{{old('sub_category_name')}}" name="sub_category_name" />
                            @error('sub_category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Category Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @php
                            $categorys = App\Models\Backend\Category::where('category_status',1)->get();
                            @endphp
                            <select class="form-select" aria-label="Default select example">
                                <option value="">Select Category</option>
                                @foreach($categorys as $category)
                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @error('sub_category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Sub Category Image</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="sub_category_image" class="form-control @error('sub_category_image') is-invalid @enderror" id="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                            @error('sub_category_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"></h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <img src="{{url('uploads/no_image.jpg') }}" class="rounded-circle p-1 bg-primary" alt="Admin" style=" width: 100px; height: 100px;" id="blah">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6 text-secondary">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary px-4" value="Insert" />
                        </div>
                    </div>
                </form>
                <!-- </div>
                </div> -->
            </div>
            <!-- <div class="modal-footer">
                
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

@endsection