@extends('admin.admin_master')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">

                                    <div id="admin_img_block">
                                        <img id="admin_img"
                                            src="{{ !empty($adminData->photo) ? url('uploads/admin/'.$adminData->photo) : url('uploads/no_image.jpg') }}"
                                            alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

                                        <div id="admin_img_overlay" style="display: none">
                                            <a href="" type="button" data-bs-toggle="modal"
                                                data-bs-target="#adminPhotoInput" id="admin_pic_edit_btn"><i
                                                    class="fa fa-camera">Edit</i></a>
                                        </div>
                                    </div>


                                    {{-- photo upload modal  --}}
                                    <div class="modal fade" id="adminPhotoInput" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="adminPhotoInputLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="adminPhotoInputLabel">Choose Your Photo
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.profile.pic.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <input type="file" name="image" id="admin_photo">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <h4>{{ $adminData->name }}</h4>
                                        <p class="text-secondary mb-1">{{ $adminData->designation }}</p>
                                        <p class="text-muted font-size-sm">{{ $adminData->address }}</p>
                                        <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>

                                </div>
                                <hr class="my-4" />
                                <ul class="list-group list-group-flush">


                                    {{-- for website link  --}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        {{-- find data here  --}}
                                        @php
                                            $webinfo = 'App\Models\SocialMedia'::where('user_id',2)->where('social_media_slug', 'website')->firstOrFail();
                                        @endphp

                                        <h6 class="mb-0"><i class="fa fa-globe fs-5 me-2"></i> Website</h6>
                                        <a href="#" class="text-secondary" id="adnim_web_link_show" style="width: 100px; height:20px; overflow-y:hidden">{{$webinfo->social_media_link}}</a>

                                        <a class="fs-5 m-1" id="admin_web_edit_btn"><i class="fa fa-pencil"></i></a>

                                        <div class="" id="admin_web_link_input_form">
                                            <form action="{{route('admin.social.link.update')}}" method="post">
                                                @csrf

                                                <input type="text" class="form-control my-3" placeholder="Give Your Website Link" name="link" value="{{$webinfo->social_media_link}}">
                                                <input type="hidden" class="form-control my-3" value="{{$webinfo->social_media_slug}}" name="slug">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                                <button type="reset" class="btn btn-danger btn-sm" id="admin_web_input_from_close"><i class="fa fa-close"></i></button>
                                            </form>
                                        </div>

                                    </li>

                                    {{-- for facebook link  --}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        {{-- find data here  --}}
                                        @php
                                            $facebookInfo = 'App\Models\SocialMedia'::where('user_id',2)->where('social_media_slug', 'facebook')->firstOrFail();
                                        @endphp

                                        <h6 class="mb-0"><i class="fa fa-facebook fs-5 me-2"></i> Facebook</h6>
                                        <a href="#" class="text-secondary" id="adnim_facebook_link_show" style="width: 100px; height:20px; overflow-y:hidden">{{$facebookInfo->social_media_link}}</a>

                                        <a class="fs-5 m-1" id="admin_facebook_edit_btn"><i class="fa fa-pencil"></i></a>

                                        <div class="{{route('admin.social.link.update')}}" id="admin_facebook_link_input_form">
                                            <form action="{{route('admin.social.link.update')}}" method="post">
                                                @csrf

                                                 <input type="hidden" class="form-control my-3" value="{{$facebookInfo->social_media_slug}}" name="slug">
                                                <input type="text" class="form-control my-3" placeholder="Give Your facebook Link" name="link"  value="{{$facebookInfo->social_media_link}}">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                                <button type="reset" class="btn btn-danger btn-sm" id="admin_facebook_input_from_close"><i class="fa fa-close"></i></button>
                                            </form>
                                        </div>

                                    </li>


                                    {{-- for linkedin link  --}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        @php
                                            $linkedinInfo = 'App\Models\SocialMedia'::where('user_id',2)->where('social_media_slug', 'linkedin')->firstOrFail();
                                        @endphp
                                        <h6 class="mb-0"><i class="fa fa-linkedin fs-5 me-2"></i> linkedin</h6>
                                        <a href="#" class="text-secondary" id="adnim_linkedin_link_show" style="width: 100px; height:20px; overflow-y:hidden">{{$linkedinInfo->social_media_link}}</a>

                                        <a class="fs-5 m-1" id="admin_linkedin_edit_btn"><i class="fa fa-pencil"></i></a>

                                        <div class="" id="admin_linkedin_link_input_form">
                                            <form action="{{route('admin.social.link.update')}}" method="post">
                                                @csrf

                                                <input type="hidden" class="form-control my-3" value="{{$linkedinInfo->social_media_slug}}" name="slug" >
                                                <input type="text" class="form-control my-3" placeholder="Give Your linkedin Link" name="link" value="{{$linkedinInfo->social_media_link}}">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                                <button type="reset" class="btn btn-danger btn-sm" id="admin_linkedin_input_from_close"><i class="fa fa-close"></i></button>
                                            </form>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            {{-- <div class="text-end">
                                <i class="fa fa-pencil btn btn-info m-2" style="font-size: larger" id="input_toggle_btn" onclick="edit_form()"></i>
                            </div> --}}
                            <form action="{{ route('admin.profile.update') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3 flex">
                                            <h6 class="mb-0">Full Name:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "admin_data_show">{{$adminData->name}}</h6> --}}
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name"
                                                value="@if ($adminData->name) {{ $adminData->name }}@else{{ old('name') }} @endif"
                                                onkeydown="show_update_button()" />

                                            @error('name')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email:</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "admin_data_show" for="">{{$adminData->email}}</h6> --}}
                                            <input type="text"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email"
                                                value="@if ($adminData->email) {{ $adminData->email }}@else{{ old('email') }} @endif"
                                                onkeydown="show_update_button()" />
                                            @error('email')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "admin_data_show" for="">{{$adminData->phone}}</h6> --}}
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                name="phone"
                                                value="@if ($adminData->phone) {{ $adminData->phone }}@else{{ old('phone') }} @endif"
                                                onkeydown="show_update_button()" />
                                            @error('phone')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Username</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6 class = "admin_data_show" for="">{{ $adminData->username }}</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            {{-- <h6 class = "admin_data_show" for="">{{$adminData->address}}</h6> --}}
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                name="address"
                                                value="@if ($adminData->address) {{ $adminData->address }}@else{{ old('address') }} @endif"
                                                onkeydown="show_update_button()" />
                                            @error('address')
                                                <span class="text-danger"></span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3" id="admin_data_update_btn_block" style="display: none">
                                        <input type="reset" class="btn btn-info" id="admin_data_reset_btn"></input>
                                        <button type="submit" class="btn btn-success" id="admin_data_update_btn">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                        <p>Web Design</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p>Website Markup</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: 72%" aria-valuenow="72" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p>One Page</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 89%" aria-valuenow="89" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p>Mobile Template</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p>Backend API</p>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 66%" aria-valuenow="66" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
