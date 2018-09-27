@extends('layouts.template')

@section('title')
ช่างตกแต่งคอนกรีต เว็บไซต์ ที่รวบรวมช่างฝีมือดีทั่วฟ้าเมืองไทย
@stop

@section('og_tag')
<meta property="og:url" content="{{url('/')}}">
<meta property="og:title" content="{{fb_title()}}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{url('assets/category_img/'.facebook_img())}}">
<meta property="og:description" content="{{fb_detail()}}">
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="314" />
<meta property="fb:admins" content="100002037238809">
<meta property="fb:app_id" content="306775720112722">
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

					<form  method="POST" action="{{url('search')}}">
					<div class="main-search-input text-center">


							{{ csrf_field() }}
						<div class="main-search-input-item">
							<select data-placeholder="All Categories" name="cat_id[]" class="chosen-select" >
								<option value="0">ค้าหาทั้งหมด</option>
								@if($category)
									@foreach($category as $u)
								<option value="{{$u->id}}">{{$u->name_cat}}</option>
									@endforeach
								@endif
							</select>
						</div>

						<div class="main-search-input-item location">
							<div id="autocomplete-container ">
								<input id="autocomplete-input" type="text" name="location" style="text-align:center" placeholder="อำเภอ, จังหวัด">
								<input id="lat" type="hidden" name="lat" />
								<input id="lng" type="hidden" name="lng" />
							</div>

						</div>



						<button class="button" type="submit">ค้นหา</button>



					</div>
					</form>
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
			@if($cat_head)
			@foreach($cat_head as $u)
			<div class="category-box-container half">
				<a href="{{url('search')}}" class="category-box" data-background-image="{{url('assets/category_img/'.$u->image_cat)}}">
					<div class="category-box-content">
						<h3>{{$u->name_cat}}</h3>
						<span>{{$u->count}} ผู้รับเหมา</span>
					</div>
					<a href="{{url('search')}}" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>

			@endforeach
			@endif

		</div>

		<!-- Item -->
		<!-- Item -->
		@if($cat)
		@foreach($cat as $u)

		<div class="fw-carousel-item">
			<div class="category-box-container">
				<a href="{{url('search')}}" class="category-box" data-background-image="{{url('assets/category_img/'.$u->image_cat)}}">
					<div class="category-box-content">
						<h3>{{$u->name_cat}}</h3>
						<span>{{$u->count}} ผู้รับเหมา</span>
					</div>
					<a href="{{url('search')}}" class="category-box-btn ">ค้นหา</a>
				</a>
			</div>
		</div>



		@endforeach
		@endif



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

					@if($tech)
					@foreach($tech as $u)
					<!-- Listing Item -->
					<div class="carousel-item">
						<a href="{{url('single_tech/'.$u->id)}}" class="listing-item-container">
							<div class="listing-item">
								<img src="{{url('assets/tech_img/'.$u->tech_imgs)}}" alt="{{$u->tech_fname}} {{$u->tech_lname}}">

								<div class="listing-item-content">
									@if($u->cat_tech)
									@foreach($u->cat_tech as $j)
									<span class="tag">{{$j->name_cat_for}}</span>
									@endforeach
									@endif
									<h3 style="font-size: 16px; line-height: 21px;">{{$u->tech_detail}} </h3>
									<span>{{$u->tech_prov}} </span>
								</div>
								<span class="like-icon"></span>
							</div>
							<div class="star-rating" data-rating="{{$u->tech_rating}}.0" style="height: 90px; padding: 15px 5px 15px 15px;">
								<div class="avatar" style="position: inherit; padding: 0 10px 0 0;">
									<img src="{{url('assets/tech_img/'.$u->tech_image)}}" alt="" style="height: 60px;">
								</div>
								<span>{{$u->tech_fname}} {{$u->tech_lname}}</span><br />
								<div class="rating-counter">({{$u->tech_view}} รีวิว)</div>
							</div>
						</a>
					</div>
					<!-- Listing Item / End -->
					@endforeach
					@endif



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
					<a href="{{url('regis_tech')}}" class="button margin-top-25">สมัครกับเรา</a>
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
			var lat = place.geometry.location.lat(),
	        lng = place.geometry.location.lng();
      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
			console.log(lat);
			console.log(lng);
			document.getElementById('lat').value = lat;
			document.getElementById('lng').value = lng;
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
