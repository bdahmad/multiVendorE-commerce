@include('vendor.includes.head')
    <!--wrapper-->
    <div class="wrapper">
        {{-- start sidebar  --}}
        @include('vendor.includes.sidebar')
        {{-- end sidebar  --}}

        <!--start header -->
        @include('vendor.includes.header')
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">

            {{-- start content  --}}

                {{-- main content here  --}}
                 @yield('content')

            {{-- end content  --}}


        </div>
        <!--end page wrapper -->

{{-- footer  --}}
@include('vendor.includes.footer')
