<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->

<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

<footer class="page-footer">
    <p class="mb-0">Copyright © 2021. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->

{{-- start switcher  --}}
{{-- @include('admin.includes.switcher') --}}
{{-- end switcher  --}}

<!-- Bootstrap JS -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="{{ asset('admin') }}/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->

<script src="{{ asset('admin') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/jquery-knob/jquery.knob.js"></script>
<script>
    $(function() {
        $(".knob").knob();
    });
</script>
{{-- toaster cnd  --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/index.js"></script>
<!--app JS-->
<script src="{{ asset('admin') }}/assets/plugins/input-tags/js/tagsinput.js"></script>

<script src="{{ asset('admin') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>



<script src="{{ asset('admin') }}/assets/js/app.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

{{-- sweet alert confirmaion here+ --}}
<script>
    $(document).ready(function() {

        // soft delete confirmation here
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link

                }
            })


        });

        // restore confirmaion here
        $(document).on('click', '#restore', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "Resotre This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Restore'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link

                }
            })


        });


        // permanently delete confirmaion here
        $(document).on('click', '#permanentlyDelete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "Permanently Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link

                }
            })


        });
    });
</script>

{{-- add product sub category load with category  --}}


</body>

</html>
