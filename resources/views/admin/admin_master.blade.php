@include('admin.includes.head')
    <!--wrapper-->
    <div class="wrapper">
        {{-- start sidebar  --}}
        @include('admin.includes.sidebar')
        {{-- end sidebar  --}}

        <!--start header -->
        @include('admin.includes.header')
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">

            {{-- start content  --}}
            <div class="page-content">

                {{-- main content here  --}}
                 @yield('content')

            {{-- end content  --}}
            </div>

        </div>
        <!--end page wrapper -->

{{-- footer  --}}
@include('admin.includes.footer')
