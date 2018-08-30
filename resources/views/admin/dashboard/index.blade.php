@extends('admin.layouts.template')



@section('stylesheet')
@stop('stylesheet')
@section('content')


<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Dashboard</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>

							<li>Dashboard</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>



		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4>6</h4> <span>ข้อความ ต้องการช่าง</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Mail-Inbox"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>726</h4> <span>ยอด <br />การเข้าชม</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
				</div>
			</div>


			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4>95</h4> <span>ยอด <br />สมัครช่างใหม่</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-3 col-md-6">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4>126</h4> <span>ยอด <br />งานสำเร็จ</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
				</div>
			</div>
		</div>


		<div class="row">

			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<h4>กิจกรรมล่าสุด </h4>
					<ul>

						<li>
							<i class="list-box-icon sl sl-icon-star"></i> ต้องการจ้าง <strong><a href="#">ช่างแดง ปูนดี</a></strong> มารับงานปูนที่ โครงการหมู่บ้านหนองแขม ท่าไม้เมือง!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

            <li>
							<i class="list-box-icon sl sl-icon-user"></i> <strong><a href="#">ช่างสง ฝ้างานดี</a></strong> ต้องการสมัครเป็นช่างฝ้า ในระบบ จังหวัดสงขลา
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

            <li>
							<i class="list-box-icon sl sl-icon-user"></i> <strong><a href="#">ช่างดำ งานเหล็ก</a></strong> ต้องการสมัครเป็นช่างเหล็ก ในระบบ จังหวัดลำปาง
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

            <li>
							<i class="list-box-icon sl sl-icon-star"></i> ต้องการจ้าง <strong><a href="#">นายช่างเมือง ไม้สวย</a></strong> มารับงานไม้ เฟอร์นิเจอร์ที่ ของโรงแรมบนเกาะช้าง ด่วนมาก!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

            <li>
							<i class="list-box-icon sl sl-icon-star"></i> ต้องการจ้าง <strong><a href="#">ช่างแดง ปูนดี</a></strong> มารับงานปูนที่ โครงการหมู่บ้านหนองแขม ท่าไม้เมือง!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

            <li>
							<i class="list-box-icon sl sl-icon-user"></i> <strong><a href="#">ช่างสง ฝ้างานดี</a></strong> ต้องการสมัครเป็นช่างฝ้า ในระบบ จังหวัดสงขลา
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

            <li>
							<i class="list-box-icon sl sl-icon-user"></i> <strong><a href="#">ช่างดำ งานเหล็ก</a></strong> ต้องการสมัครเป็นช่างเหล็ก ในระบบ จังหวัดลำปาง
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>

            <li>
							<i class="list-box-icon sl sl-icon-star"></i> ต้องการจ้าง <strong><a href="#">นายช่างเมือง ไม้สวย</a></strong> มารับงานไม้ เฟอร์นิเจอร์ที่ ของโรงแรมบนเกาะช้าง ด่วนมาก!
							<a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
						</li>


					</ul>
				</div>
			</div>

			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>ใบรับงาน วันนี้</h4>
					<ul>

						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>ช่างแดง ปะปา</strong> ไม่ว่างรับงาน ขอยกเลิก
							<ul>
								<li class="unpaid">Unpaid</li>
								<li>Order: #00124</li>
								<li>Date: 20/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="#" class="button gray">ดูรายละเอียด</a>
							</div>
						</li>

						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>ช่างเก่ง ฟ้าทีบา</strong> รับงาน <strong>ดร.อุดม</strong> งานไม้ รร. ม่านดีร่มเย็น
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00108</li>
								<li>Date: 14/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="#" class="button gray">ดูรายละเอียด</a>
							</div>
						</li>

						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>ช่างเป็ง ลวดลาย</strong> รับงาน <strong>ครูสมปอง</strong> งานสี โรงเรียนอ้อมน้อย
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00097</li>
								<li>Date: 10/07/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="#" class="button gray">ดูรายละเอียด</a>
							</div>
						</li>

						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong>ช่างยุทร</strong> รับงาน <strong>คุณนิวตั้น</strong> งานเหล็ก รั้วประตูบ้าน
							<ul>
								<li class="paid">Paid</li>
								<li>Order: #00091</li>
								<li>Date: 30/06/2017</li>
							</ul>
							<div class="buttons-to-right">
								<a href="#" class="button gray">ดูรายละเอียด</a>
							</div>
						</li>

					</ul>
				</div>
			</div>


			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->



@endsection

@section('scripts')



@stop('scripts')
