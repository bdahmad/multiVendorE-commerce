
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->

    {{-- start switcher  --}}
    {{-- @include('admin.includes.switcher') --}}
    {{-- end switcher  --}}

    	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('admin')}}/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{asset('admin')}}/assets/js/jquery.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('admin')}}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#Transaction-History').DataTable({
				lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']]
			});
		  } );
	</script>
	<script src="{{asset('admin')}}/assets/js/dashboard-eCommerce.js"></script>
	<!--app JS-->
	<script src="{{asset('admin')}}/assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>

    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
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


</body>

</html>
