		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('admin')}}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Vendor</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
                <li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
                <li class="menu-label">Manage Product</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Product</div>
					</a>
					<ul>

                        <li> <a href="{{route('vendor.add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Products</a>

                        <li> <a href="{{route('vendor.all.product')}}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
                        </li>

                        <li> <a href="{{route('vendor.recycle.product')}}"><i class="bx bx-right-arrow-alt"></i>Trash</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="https://themeforest.net/user/codervent" target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
