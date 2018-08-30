@extends('layouts.template')

@section('title')
MASTER PHOTO NETWORK: ร้านมาสเตอร์ อัด ขยาย ภาพ อัดภาพระบบดิจิตอล กรอบลอย canvas FRAME กรอบรูป studio ร้านถ่ายรูป
@stop

@section('stylesheet')
@stop('stylesheet')
@section('content')


<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="assets/images/main-search-background-01.jpg">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">


					<div class="main-search-input text-center">

						<div class="main-search-input-item">
							<select data-placeholder="All Categories" class="chosen-select" >
								<option>ประเภทงานรับเหมา</option>
								<option>งานออกแบบบ้าน</option>
								<option>งานปูน</option>
								<option>งานไม้</option>
								<option>งานเหล็ก</option>
								<option>งานฝ้าเพดาน</option>
							</select>
						</div>

						<div class="main-search-input-item location">
							<div id="autocomplete-container ">
								<input id="autocomplete-input" type="text" style="text-align:center" placeholder="อำเภอ, จังหวัด">
							</div>

						</div>



						<button class="button" onclick="window.location.href='{{url('search')}}'">ค้นหา</button>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h2 class="headline centered margin-top-75">
				ขั้นตอนการจ้างผู้รับเหมา

			</h2>
		</div>

	</div>


	<div class="row icons-container">
		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">

				<img src="assets/images/icon2.png" alt="">
				<h3>บริการค้นหาช่าง</h3>
				<p>ที่ เว็บไซต์.... เรารวบรวมช่าง รับเหมา <br />จากทุกจังหวัด ทั่วทุกภูมิภาค<br />ของประเทศไทย</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<img src="assets/images/icon1.png" alt="">
				<h3>ติดต่อเรา</h3>
				<p>ระบุรายละเอียดงานก่อสร้างให้ ชัดเจน<br />ครบถ้วนเพื่อความ รวดเร็วในการ<br />ประสานงาน</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<img src="assets/images/icon3.png" alt="">
				<h3>ผู้ว่าจ้างและผู้รับเหมาเจรจา</h3>
				<p>เราจะคัดเลือกช่างรับเหมา สมาชิก <br />เว็บไซต์... ที่ตรงตาม้ รูปแบบ<br />งานก่อสร้างของคุณ</p>
			</div>
		</div>
	</div>
</div>
<br />
<br />

<hr />

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-65">
				ค้นหาตามประเภทงาน

			</h3>
		</div>

	</div>
</div>



<!-- Categories Carousel -->
<div class="fullwidth-carousel-container margin-top-25 padding-bottom-70">
	<div class="fullwidth-slick-carousel category-carousel">

		<!-- Item -->
		<div class="fw-carousel-item">

			<!-- this (first) box will be hidden under 1680px resolution -->
			<div class="category-box-container half">
				<a href="search.html" class="category-box" data-background-image="assets/images/cat_tech1.jpg">
					<div class="category-box-content">
						<h3>ช่างปะปา</h3>
						<span>64 ผู้รับเหมา</span>
					</div>
					<a href="search.html" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>

			<div class="category-box-container half">
				<a href="search.html" class="category-box" data-background-image="assets/images/cat_tech1.jpg">
					<div class="category-box-content">
						<h3>ช่างปูกระเบื้อง</h3>
						<span>14 ผู้รับเหมา</span>
					</div>
					<a href="search.html" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="search.html" class="category-box" data-background-image="assets/images/cat_tech3.jpg">
					<div class="category-box-content">
						<h3>ช่างปูน</h3>
						<span>67 ผู้รับเหมา</span>
					</div>
					<a href="search.html" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="search.html" class="category-box" data-background-image="assets/images/cat_tech4.jpg">
					<div class="category-box-content">
						<h3>ช่างทาสี</h3>
						<span>27 ผู้รับเหมา</span>
					</div>
					<a href="search.html" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="search.html" class="category-box" data-background-image="assets/images/cat_tech5.jpg">
					<div class="category-box-content">
						<h3>ช่างจัดสวน</h3>
						<span>22 ผู้รับเหมา</span>
					</div>
					<a href="search.html" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>
		</div>

		<!-- Item -->
		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="search.html" class="category-box" data-background-image="assets/images/cat_tech6.jpg">
					<div class="category-box-content">
						<h3>พนังพิมพ์ลาย</h3>
						<span>130 ผู้รับเหมา</span>
					</div>
					<a href="search.html" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>
		</div>

	</div>
</div>
<!-- Categories Carousel / End -->





<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70 margin-bottom-85" style="background-image: url('assets/images/bg_green.png');">

	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h1 class="headline centered margin-bottom-45" style="color: #fff;">
					ช่างที่เราแนะนำ

				</h1>
			</div>

			<div class="col-md-12">
				<div class="simple-slick-carousel dots-nav">

					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech')}}" class="listing-item-container">
							<div class="listing-item">
								<img src="assets/images/1232718383.jpg" alt="">

								<div class="listing-item-content">
									<span class="tag">ช่างทาสี</span>
									<h3>ทำสีภายในและรับเหมาก่อสร้าง </h3>
									<span>ลาดพร้าว, กรุงเทพมหานคร </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="5.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="assets/images/user-avatar_1.jpg" alt="" style="height: 60px;">
								</div>
								<span>ช่างแพรวา สุธรรมพงษ์</span><br />
								<div class="rating-counter">(23 รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->



					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech')}}" class="listing-item-container">
							<div class="listing-item">
								<img src="assets/images/1277113934.jpg" alt="">

								<div class="listing-item-content">
									<span class="tag">ช่างฝ้าเพดาน</span>
									<h3>ช่างฝ้าเพดาน ช่างทำฝ้า รับติดตั้งผ้า </h3>
									<span>ลาดพร้าว, กรุงเทพมหานคร </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="5.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="assets/images/user-avatar_2.jpg" alt="" style="height: 60px;">
								</div>
								<span>ช่างเฌอปราง อารีย์กุล</span><br />
								<div class="rating-counter">(10 รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->

					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech')}}" class="listing-item-container">
							<div class="listing-item">
								<img src="assets/images/275193-545b1c211e003.jpg" alt="">

								<div class="listing-item-content">
									<span class="tag">ช่างปูน</span>
									<h3>ช่างปูน งานก่ออิฐ-ฉาบปูน ปูกระเบื้อง </h3>
									<span>คันนายาว, กรุงเทพมหานคร </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="5.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="assets/images/user-avatar_2.jpg" alt="" style="height: 60px;">
								</div>
								<span>ช่างเฌอปราง อารีย์กุล</span><br />
								<div class="rating-counter">(10 รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->

					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech')}}" class="listing-item-container">
							<div class="listing-item">
								<img src="assets/images/275193-545b1cd211e003.jpg" alt="">

								<div class="listing-item-content">
									<span class="tag">ช่างหลังคา</span>
									<h3>ทำสีภายในและรับเหมาก่อสร้าง </h3>
									<span>ลาดพร้าว, กรุงเทพมหานคร </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="5.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="assets/images/user-avatar_4.jpg" alt="" style="height: 60px;">
								</div>
								<span>ช่างแพรวา สุธรรมพงษ์</span><br />
								<div class="rating-counter">(120 รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->

					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech')}}" class="listing-item-container">
							<div class="listing-item">
								<img src="assets/images/E453052AF9FF4CDE9B296EDDAC010000.jpg" alt="">

								<div class="listing-item-content">
									<span class="tag">ช่างทาสี</span>
									<h3>ทำสีภายในและรับเหมาก่อสร้าง </h3>
									<span>ลาดพร้าว, กรุงเทพมหานคร </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="5.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="assets/images/user-avatar_5.jpg" alt="" style="height: 60px;">
								</div>
								<span>มิลิน ดอกเทียน  </span><br />
								<div class="rating-counter">(80 รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->

					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech')}}" class="listing-item-container">
							<div class="listing-item">
								<img src="assets/images/1-3-750x498.jpg" alt="">

								<div class="listing-item-content">
									<span class="tag">ช่างเหล็ก</span>
									<h3>ช่างเหล็กเชียงใหม่ ทางเรายินดีให้บริการ </h3>
									<span>หางดง, เชียงใหม่ </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="5.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="assets/images/user-avatar_6.jpg" alt="" style="height: 60px;">
								</div>
								<span>พัศชนันท์ เจียจิรโชติ</span><br />
								<div class="rating-counter">(15 รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->

					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech')}}" class="listing-item-container">
							<div class="listing-item">
								<img src="assets/images/1232718383.jpg" alt="">

								<div class="listing-item-content">
									<span class="tag">ช่างทาสี</span>
									<h3>ทำสีภายในและรับเหมาก่อสร้าง </h3>
									<span>ลาดพร้าว, กรุงเทพมหานคร </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="5.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="assets/images/user-avatar_7.jpg" alt="" style="height: 60px;">
								</div>
								<span>ปัญสิกรณ์ ติยะกร  </span><br />
								<div class="rating-counter">(5 รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->

				</div>

			</div>

		</div>
	</div>

</section>
<!-- Fullwidth Section / End -->


<!-- Parallax -->
<div class="parallax"
	data-background="assets/images/slider-bg-01.jpg"
	data-color="#36383e"
	data-color-opacity="0.2"
	data-img-width="800"
	data-img-height="505" style="min-height:500px">

	<!-- Infobox -->
	<div class="text-content white-font">
		<div class="container">

			<div class="row">
				<div class="col-lg-6 col-sm-8">
					<h2>ร่วมเป็นผู้รับเหมากับเรา</h2>
					<p>การเลือกวัสดุก่อสร้าง ทำเสร็จตามกำหนดสัญญา ใส่ใจทุกขั้นตอน ระบุจำนวนคนงาน ความสามารถในการรับงานพร้อมกัน เป็นต้น คุณสมบัติที่สำคัญ ของช่าง ช่าง ที่ดีควรทำข้อมูลอย่างละเอียด เพิ่มโอกาสรับงาน</p>
					<a href="regis_tech.html" class="button margin-top-25">สมัครกับเรา</a>
				</div>
			</div>

		</div>
	</div>

	<!-- Infobox / End -->

</div>
<!-- Parallax / End -->



@endsection

@section('scripts')

<!-- Google Autocomplete -->
<script>
  function initAutocomplete() {
    var input = document.getElementById('autocomplete-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
    });

	if ($('.main-search-input-item')[0]) {
	    setTimeout(function(){
	        $(".pac-container").prependTo("#autocomplete-container");
	    }, 300);
	}
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpN7ALbslkRAqQEdaS1Bz0J-Tu7e8rzy8&libraries=places&callback=initAutocomplete"></script>


@stop('scripts')
