<style>

ul.nav-main > li.nav-expanded > a {
  box-shadow: 2px 0 0 #ee413c inset;
}
html.no-overflowscrolling .nano > .nano-pane > .nano-slider {
    background: #ee413c;
}
.page-header h2 {
    border-bottom-color: #ee413c;
}
</style>
<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar" ></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

                  <li {{ (Request::is('admin/dashboard*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/dashboard/')}}"  >
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>




                  <li {{ (Request::is('admin/category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/category/')}}"  >
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>ประเภทงาน</span>
										</a>
									</li>



                  <li {{ (Request::is('admin/tech_list*') ? 'class=nav-expanded' : '') }} {{ (Request::is('admin/edit_job*') ? 'class=nav-expanded' : '') }} {{ (Request::is('admin/tech_gallery*') ? 'class=nav-expanded' : '') }} {{ (Request::is('admin/tech_job*') ? 'class=nav-expanded' : '') }}>
										<a href="{{url('admin/tech_list/')}}"  >
											<i class="fa fa-cube" aria-hidden="true"></i>
											<span>ช่างในระบบ</span>
										</a>
									</li>





                  <li {{ (Request::is('admin/contact_admin*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/contact_admin/')}}"  >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>ข้อความถึงช่าง</span>
										</a>
									</li>


                  <li {{ (Request::is('admin/us_contact*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/us_contact/')}}"  >
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<span>จัดการ contact</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/setting*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/setting/')}}"  >
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<span>ตั้งค่าระบบ</span>
										</a>
									</li>






								</ul>



							</nav>



							<hr class="separator" />


						</div>

					</div>

				</aside>
				<!-- end: sidebar -->
