<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Listeo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/colors/green.css" id="colors">
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">

      <!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="{{url('/')}}"><img src="assets/images/logo3.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


				<!-- Main Navigation -->
				<nav id="navigation" class="style-1 visible-sm visible-xs">
					<ul id="responsive" class="">

						<li><a class="current" href="{{url('/')}}">หน้าหลัก</a></li>
						<li><a href="{{url('about')}}">เกี่ยวกับเรา</a></li>
						<li><a href="{{url('contact')}}">ติดต่อเรา</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
					<a href="{{url('/')}}" class="sign-in hidden-sm hidden-xs"> หน้าหลัก</a>
					<a href="{{url('about')}}" class="sign-in hidden-sm hidden-xs"> เกี่ยวกับเรา</a>
					<a href="{{url('contact')}}" class="sign-in hidden-sm hidden-xs"> ติดต่อเรา</a>

					@if (Auth::guest())
					<a href="{{url('login')}}" class="sign-in hidden-sm hidden-xs"> Sign In</a>
					@else

					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name" style="color:#fff"><span><img src="images/dashboard-avatar.jpg" alt=""></span>Hi, {{ Auth::user()->name }}!</div>
						<ul>

							<li><a href="{{url('logout')}}"><i class="sl sl-icon-power"></i> Logout</a></li>
						</ul>
					</div>
					@endif

					<a href="{{url('regis_tech')}}" class="button with-icon" style="border-radius: 2px;font-size: 16px;"> สมัครเป็นผู้รับเหมา </a>
				</div>
			</div>
			<!-- Right Side Content / End -->



		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Content
================================================== -->
<div class="fs-container">

	<div class="fs-inner-container content">
		<div class="fs-content">

			<!-- Search -->
			<section class="search">

				<div class="row">
					<div class="col-md-12">

							<!-- Row With Forms -->
							<div class="row with-forms">

								<!-- Main Search Input -->
								<div class="col-fs-6">
									<div class="input-with-icon">
										<i class="sl sl-icon-magnifier"></i>
										<input type="text" placeholder="ค้นหาช่าง" value=""/>
									</div>
								</div>

								<!-- Main Search Input -->
								<div class="col-fs-6">
									<div class="input-with-icon location">
										<div id="autocomplete-container">
											<input id="autocomplete-input" type="text" placeholder="อำเภอ, จังหวัด">
										</div>
										<a href="#"><i class="fa fa-map-marker"></i></a>
									</div>
								</div>


								<!-- Filters -->
								<div class="col-fs-12">

									<!-- Panel Dropdown / End -->
									<div class="panel-dropdown">
										<a href="#">ประเภทงาน</a>
										<div class="panel-dropdown-content checkboxes categories">

											<!-- Checkboxes -->
											<div class="row">
												<div class="col-md-6">
													<input id="check-1" type="checkbox" name="check" checked class="all">
													<label for="check-1">ค้นหาทั้งหมด</label>

													<input id="check-2" type="checkbox" name="check">
													<label for="check-2">ช่างปูน</label>

													<input id="check-3" type="checkbox" name="check">
													<label for="check-3">ช่างไม้</label>
												</div>

												<div class="col-md-6">
													<input id="check-4" type="checkbox" name="check" >
													<label for="check-4">ช่างไฟฟ้า</label>

													<input id="check-5" type="checkbox" name="check">
													<label for="check-5">ช่างทำท่อปะปา</label>

													<input id="check-6" type="checkbox" name="check">
													<label for="check-6">ช่างเหล็ก</label>
												</div>
											</div>

											<!-- Buttons -->
											<div class="panel-buttons">
												<button class="panel-cancel">ยกเลิก</button>
												<button class="panel-apply">ค้นหา</button>
											</div>

										</div>
									</div>
									<!-- Panel Dropdown / End -->

									<!-- Panel Dropdown -->
									<div class="panel-dropdown wide">
										<a href="#">ระยะทางจากจุดค้นหา</a>
                    <div class="panel-dropdown-content">
											<input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination">
											<div class="panel-buttons">
												<button class="panel-cancel">Disable</button>
												<button class="panel-apply">Apply</button>
											</div>
										</div>
									</div>
									<!-- Panel Dropdown / End -->




								</div>
								<!-- Filters / End -->

							</div>
							<!-- Row With Forms / End -->

					</div>
				</div>

			</section>
			<!-- Search / End -->


		<section class="listings-container margin-top-30">
			<!-- Sorting / Layout Switcher -->
			<div class="row fs-switcher">

				<div class="col-md-6">
					<!-- Showing Results -->
					<p class="showing-results">14 ผลการค้นหา </p>
				</div>

			</div>


			<!-- Listings -->
			<div class="row fs-listings">

				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout" data-marker-id="1">
						<a href="{{url('single_tech')}}" class="listing-item">

							<!-- Image -->
							<div class="listing-item-image">
								<img src="assets/images/1232718383.jpg" alt="">
								<span class="tag">ช่างทาสี</span>
							</div>

							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
									<h3 style="line-height: 25px;">ทำสีภายในและรับเหมาก่อสร้าง ทั่วไป ทั้งในจังหวัด ทั่วประเทศ </h3>
									<span style="font-size: 14px;">ลาดพร้าว, กรุงเทพมหานคร</span>

								</div>

                <div class="star-rating pull-right" style="margin-right:10px; padding-top:18px;" data-rating="3.5">
                  <div class="rating-counter" style="font-size:12px;">(12 รีวิว)</div>
                </div>

                <div class="avatar" style="position: inherit; padding: 0 10px 0 0;bottom: 20px;  position: absolute; padding-left:25px;">
									<img src="assets/images/user-avatar_1.jpg" alt="" style="height: 60px; width: 60px;border-radius: 50%;">
                  <span style="color:#000">ช่างแพรวา สุธรรมพงษ์</span><br />
								</div>


							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->



        <!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout" data-marker-id="1">
						<a href="{{url('single_tech')}}" class="listing-item">

							<!-- Image -->
							<div class="listing-item-image">
								<img src="assets/images/1-3-750x498.jpg" alt="">
								<span class="tag">ช่างทาสี</span>
							</div>

							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
									<h3 style="line-height: 25px;">ทำสีภายในและรับเหมาก่อสร้าง ทั่วไป ทั้งในจังหวัด ทั่วประเทศ </h3>
									<span style="font-size: 14px;">ลาดพร้าว, กรุงเทพมหานคร</span>

								</div>

                <div class="star-rating pull-right" style="margin-right:10px; padding-top:18px;" data-rating="3.5">
                  <div class="rating-counter" style="font-size:12px;">(12 รีวิว)</div>
                </div>

                <div class="avatar" style="position: inherit; padding: 0 10px 0 0;bottom: 20px;  position: absolute; padding-left:25px;">
									<img src="assets/images/user-avatar_2.jpg" alt="" style="height: 60px; width: 60px;border-radius: 50%;">
                  <span style="color:#000">ช่างแพรวา สุธรรมพงษ์</span><br />
								</div>


							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->


        <!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout" data-marker-id="1">
						<a href="{{url('single_tech')}}" class="listing-item">

							<!-- Image -->
							<div class="listing-item-image">
								<img src="assets/images/1277113934.jpg" alt="">
								<span class="tag">ช่างทาสี</span>
							</div>

							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
									<h3 style="line-height: 25px;">ทำสีภายในและรับเหมาก่อสร้าง ทั่วไป ทั้งในจังหวัด ทั่วประเทศ </h3>
									<span style="font-size: 14px;">ลาดพร้าว, กรุงเทพมหานคร</span>

								</div>

                <div class="star-rating pull-right" style="margin-right:10px; padding-top:18px;" data-rating="3.5">
                  <div class="rating-counter" style="font-size:12px;">(12 รีวิว)</div>
                </div>

                <div class="avatar" style="position: inherit; padding: 0 10px 0 0;bottom: 20px;  position: absolute; padding-left:25px;">
									<img src="assets/images/user-avatar_3.jpg" alt="" style="height: 60px; width: 60px;border-radius: 50%;">
                  <span style="color:#000">ช่างแพรวา สุธรรมพงษ์</span><br />
								</div>


							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->


        <!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout" data-marker-id="1">
						<a href="{{url('single_tech')}}" class="listing-item">

							<!-- Image -->
							<div class="listing-item-image">
								<img src="assets/images/275193-545b1cd211e003.jpg" alt="">
								<span class="tag">ช่างทาสี</span>
							</div>

							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
									<h3 style="line-height: 25px;">ทำสีภายในและรับเหมาก่อสร้าง ทั่วไป ทั้งในจังหวัด ทั่วประเทศ </h3>
									<span style="font-size: 14px;">ลาดพร้าว, กรุงเทพมหานคร</span>

								</div>

                <div class="star-rating pull-right" style="margin-right:10px; padding-top:18px;" data-rating="3.5">
                  <div class="rating-counter" style="font-size:12px;">(12 รีวิว)</div>
                </div>

                <div class="avatar" style="position: inherit; padding: 0 10px 0 0;bottom: 20px;  position: absolute; padding-left:25px;">
									<img src="assets/images/user-avatar_4.jpg" alt="" style="height: 60px; width: 60px;border-radius: 50%;">
                  <span style="color:#000">ช่างแพรวา สุธรรมพงษ์</span><br />
								</div>


							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->


        <!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout" data-marker-id="1">
						<a href="{{url('single_tech')}}" class="listing-item">

							<!-- Image -->
							<div class="listing-item-image">
								<img src="assets/images/275193-545b1c211e003.jpg" alt="">
								<span class="tag">ช่างทาสี</span>
							</div>

							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
									<h3 style="line-height: 25px;">ทำสีภายในและรับเหมาก่อสร้าง ทั่วไป ทั้งในจังหวัด ทั่วประเทศ </h3>
									<span style="font-size: 14px;">ลาดพร้าว, กรุงเทพมหานคร</span>

								</div>

                <div class="star-rating pull-right" style="margin-right:10px; padding-top:18px;" data-rating="3.5">
                  <div class="rating-counter" style="font-size:12px;">(12 รีวิว)</div>
                </div>

                <div class="avatar" style="position: inherit; padding: 0 10px 0 0;bottom: 20px;  position: absolute; padding-left:25px;">
									<img src="assets/images/user-avatar_5.jpg" alt="" style="height: 60px; width: 60px;border-radius: 50%;">
                  <span style="color:#000">ช่างแพรวา สุธรรมพงษ์</span><br />
								</div>


							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->



			</div>
			<!-- Listings Container / End -->


			<!-- Pagination Container -->
			<div class="row fs-listings" >
				<div class="col-md-12">

					<!-- Pagination -->
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12">
							<!-- Pagination -->
							<div class="pagination-container margin-top-15 margin-bottom-40">
								<nav class="pagination">
									<ul>
										<li><a href="#" class="current-page">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Pagination / End -->

					<!-- Copyrights -->
					<div class="copyrights margin-top-0">© 2017 Listeo. All Rights Reserved.</div>

				</div>
			</div>
			<!-- Pagination Container / End -->
		</section>

		</div>
	</div>
	<div class="fs-inner-container map-fixed">

		<!-- Map -->
		<div id="map-container">
		    <div id="map" data-map-zoom="9" data-map-scroll="true">
		        <!-- map goes here -->
		    </div>
		</div>

	</div>
</div>


</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<script type="text/javascript" src="assets/scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="assets/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="assets/scripts/chosen.min.js"></script>
<script type="text/javascript" src="assets/scripts/slick.min.js"></script>
<script type="text/javascript" src="assets/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="assets/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="assets/scripts/counterup.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="assets/scripts/custom.js"></script>


<!-- Google Autocomplete -->
<script>
  function initAutocomplete() {





}


function mainMap() {

  // Locations
  // ----------------------------------------------- //
  var ib = new InfoBox();

  var input = document.getElementById('autocomplete-input');
  var autocomplete = new google.maps.places.Autocomplete(input);



  autocomplete.addListener('place_changed', function() {
    var bounds = new google.maps.LatLngBounds();
    var place = autocomplete.getPlace();
    var lat = place.geometry.location.lat(),
        lng = place.geometry.location.lng();
    if (!place.geometry) {
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }
    if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
          map.fitBounds(bounds);


          console.log(lat);
          console.log(lng);

  });


if ($('.main-search-input-item')[0]) {
    setTimeout(function(){
        $(".pac-container").prependTo("#autocomplete-container");
    }, 300);
}







  // Infobox Output
  function locationData(locationURL,locationImg,locationTitle, locationAddress, locationRating, locationRatingCounter) {
      return(''+
        '<a href="'+ locationURL +'" class="listing-img-container">'+
           '<div class="infoBox-close"><i class="fa fa-times"></i></div>'+
           '<img src="'+locationImg+'" alt="">'+

           '<div class="listing-item-content">'+
              '<h3>'+locationTitle+'</h3>'+
              '<span>'+locationAddress+'</span>'+
           '</div>'+

        '</a>'+

        '<div class="listing-content">'+
           '<div class="listing-title">'+
              '<div class="'+infoBox_ratingType+'" data-rating="'+locationRating+'"><div class="rating-counter">('+locationRatingCounter+' reviews)</div></div>'+
           '</div>'+
        '</div>')
  }



  // Locations
  var locations = [
    [ locationData('single_tech','assets/images/1232718383.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '3.5', '12'), 13.7085005, 100.3779119, 1, '<img src="assets/images/user-avatar_1.jpg" style="height: 36px; width:36px; border-radius: 50%;">'],
    [ locationData('single_tech','assets/images/275193-545b1c211e003.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '5.0', '23'), 13.81786925, 100.4489744, 2, '<img src="assets/images/user-avatar_2.jpg" style="height: 36px; width:36px; border-radius: 50%;">'],
    [ locationData('single_tech','assets/images/1277113934.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '2.0', '17'), 13.7154553, 100.4063138, 3, '<img src="assets/images/user-avatar_3.jpg" style="height: 36px; width:36px; border-radius: 50%;">' ],
    [ locationData('single_tech','assets/images/275193-545b1cd211e003.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '5.0', '31'), 13.7188506, 100.5387318,     4, '<img src="assets/images/user-avatar_4.jpg" style="height: 36px; width:36px; border-radius: 50%;">' ],
    [ locationData('single_tech','assets/images/E453052AF9FF4CDE9B296EDDAC010000.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '3.5', '46'), 13.7243693, 100.5393755,  5, '<img src="assets/images/user-avatar_5.jpg" style="height: 36px; width:36px; border-radius: 50%;">'],
    [ locationData('single_tech','assets/images/1-3-750x498.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '4.5', '15'), 13.747118, 100.573986,  6, '<img src="assets/images/user-avatar_6.jpg" style="height: 36px; width:36px; border-radius: 50%;">'],
    [ locationData('single_tech','assets/images/275193-545b1c211e003.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '5.0', '31'), 13.8158324, 100.5617, 7, '<img src="assets/images/user-avatar_7.jpg" style="height: 36px; width:36px; border-radius: 50%;">'],

    [ locationData('single_tech','assets/images/1277113934.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '5.0', '31'), 13.841726, 100.5715835, 7, '<img src="assets/images/user-avatar_6.jpg" style="height: 36px; width:36px; border-radius: 50%;">'],
    [ locationData('single_tech','assets/images/E453052AF9FF4CDE9B296EDDAC010000.jpg',"ช่างแพรวา สุธรรมพงษ์",'ทำสีภายในและรับเหมาก่อสร้าง', '5.0', '31'), 13.8573065, 100.6275371,  7, '<img src="assets/images/user-avatar_1.jpg" style="height: 36px; width:36px; border-radius: 50%;">'],
  ];

  // Chosen Rating Type
  google.maps.event.addListener(ib,'domready',function(){
     if (infoBox_ratingType = 'numerical-rating') {
        numericalRating('.infoBox .'+infoBox_ratingType+'');
     }
     if (infoBox_ratingType = 'star-rating') {
        starRating('.infoBox .'+infoBox_ratingType+'');
     }
  });



  // Map Attributes
  // ----------------------------------------------- //

  var mapZoomAttr = $('#map').attr('data-map-zoom');
  var mapScrollAttr = $('#map').attr('data-map-scroll');

  if (typeof mapZoomAttr !== typeof undefined && mapZoomAttr !== false) {
      var zoomLevel = parseInt(mapZoomAttr);
  } else {
      var zoomLevel = 5;
  }

  if (typeof mapScrollAttr !== typeof undefined && mapScrollAttr !== false) {
     var scrollEnabled = parseInt(mapScrollAttr);
  } else {
    var scrollEnabled = false;
  }


  // Main Map
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    scrollwheel: scrollEnabled,
    center: new google.maps.LatLng(13.76751, 100.5064158),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControl: false,
    mapTypeControl: false,
    scaleControl: false,
    panControl: false,
    navigationControl: false,
    streetViewControl: false,
    gestureHandling: 'cooperative',

    // Google Map Style
    styles: [{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#747474"},{"lightness":"23"}]},{"featureType":"poi.attraction","elementType":"geometry.fill","stylers":[{"color":"#f38eb0"}]},{"featureType":"poi.government","elementType":"geometry.fill","stylers":[{"color":"#ced7db"}]},{"featureType":"poi.medical","elementType":"geometry.fill","stylers":[{"color":"#ffa5a8"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#c7e5c8"}]},{"featureType":"poi.place_of_worship","elementType":"geometry.fill","stylers":[{"color":"#d6cbc7"}]},{"featureType":"poi.school","elementType":"geometry.fill","stylers":[{"color":"#c4c9e8"}]},{"featureType":"poi.sports_complex","elementType":"geometry.fill","stylers":[{"color":"#b1eaf1"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":"100"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"},{"lightness":"100"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffd4a5"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffe9d2"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"weight":"3.00"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"weight":"0.30"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#747474"},{"lightness":"36"}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#e9e5dc"},{"lightness":"30"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":"100"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#d2e7f7"}]}]

  });


  // Marker highlighting when hovering listing item
  $('.listing-item-container').on('mouseover', function(){

    var listingAttr = $(this).data('marker-id');

    if(listingAttr !== undefined) {
      var listing_id = $(this).data('marker-id') - 1;
      var marker_div = allMarkers[listing_id].div;

      $(marker_div).addClass('clicked');

      $(this).on('mouseout', function(){
          if ($(marker_div).is(":not(.infoBox-opened)")) {
             $(marker_div).removeClass('clicked');
          }
       });
    }

  });


  // Infobox
  // ----------------------------------------------- //

  var boxText = document.createElement("div");
  boxText.className = 'map-box'

  var currentInfobox;

  var boxOptions = {
          content: boxText,
          disableAutoPan: false,
          alignBottom : true,
          maxWidth: 0,
          pixelOffset: new google.maps.Size(-134, -55),
          zIndex: null,
          boxStyle: {
            width: "270px"
          },
          closeBoxMargin: "0",
          closeBoxURL: "",
          infoBoxClearance: new google.maps.Size(25, 25),
          isHidden: false,
          pane: "floatPane",
          enableEventPropagation: false,
  };


  var markerCluster, overlay, i;
  var allMarkers = [];

  var clusterStyles = [
    {
      textColor: 'white',
      url: '',
      height: 50,
      width: 50
    }
  ];


  var markerIco;
  for (i = 0; i < locations.length; i++) {

    markerIco = locations[i][4];

    var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]),

    overlay = new CustomMarker(
     overlaypositions,
      map,
      {
        marker_id: i
      },
      markerIco
    );

    allMarkers.push(overlay);

    google.maps.event.addDomListener(overlay, 'click', (function(overlay, i) {

    return function() {
         ib.setOptions(boxOptions);
         boxText.innerHTML = locations[i][0];
         ib.close();
         ib.open(map, overlay);
         currentInfobox = locations[i][3];
         // var latLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
         // map.panTo(latLng);
         // map.panBy(0,-90);


        google.maps.event.addListener(ib,'domready',function(){
          $('.infoBox-close').click(function(e) {
              e.preventDefault();
              ib.close();
              $('.map-marker-container').removeClass('clicked infoBox-opened');
          });

        });

      }
    })(overlay, i));

  }


  // Marker Clusterer Init
  // ----------------------------------------------- //

  var options = {
      imagePath: 'images/',
      styles : clusterStyles,
      minClusterSize : 2
  };

  markerCluster = new MarkerClusterer(map, allMarkers, options);

  google.maps.event.addDomListener(window, "resize", function() {
      var center = map.getCenter();
      google.maps.event.trigger(map, "resize");
      map.setCenter(center);
  });



  // Custom User Interface Elements
  // ----------------------------------------------- //

  // Custom Zoom-In and Zoom-Out Buttons
    var zoomControlDiv = document.createElement('div');
    var zoomControl = new ZoomControl(zoomControlDiv, map);

    function ZoomControl(controlDiv, map) {

      zoomControlDiv.index = 1;
      map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
      // Creating divs & styles for custom zoom control
      controlDiv.style.padding = '5px';
      controlDiv.className = "zoomControlWrapper";

      // Set CSS for the control wrapper
      var controlWrapper = document.createElement('div');
      controlDiv.appendChild(controlWrapper);

      // Set CSS for the zoomIn
      var zoomInButton = document.createElement('div');
      zoomInButton.className = "custom-zoom-in";
      controlWrapper.appendChild(zoomInButton);

      // Set CSS for the zoomOut
      var zoomOutButton = document.createElement('div');
      zoomOutButton.className = "custom-zoom-out";
      controlWrapper.appendChild(zoomOutButton);

      // Setup the click event listener - zoomIn
      google.maps.event.addDomListener(zoomInButton, 'click', function() {
        map.setZoom(map.getZoom() + 1);
      });

      // Setup the click event listener - zoomOut
      google.maps.event.addDomListener(zoomOutButton, 'click', function() {
        map.setZoom(map.getZoom() - 1);
      });

  }


  // Scroll enabling button
  var scrollEnabling = $('#scrollEnabling');

  $(scrollEnabling).click(function(e){
      e.preventDefault();
      $(this).toggleClass("enabled");

      if ( $(this).is(".enabled") ) {
         map.setOptions({'scrollwheel': true});
      } else {
         map.setOptions({'scrollwheel': false});
      }
  })


  // Geo Location Button
  $("#geoLocation, .input-with-icon.location a").click(function(e){
      e.preventDefault();
      geolocate();
  });

  function geolocate() {

      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function (position) {
              var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
              map.setCenter(pos);
              map.setZoom(12);
          });
      }
  }

}

function singleListingMap() {

  var myLatlng = new google.maps.LatLng({lng: $( '#singleListingMap' ).data('longitude'),lat: $( '#singleListingMap' ).data('latitude'), });

  var single_map = new google.maps.Map(document.getElementById('singleListingMap'), {
    zoom: 11,
    center: myLatlng,
    scrollwheel: false,
    zoomControl: false,
    mapTypeControl: false,
    scaleControl: false,
    panControl: false,
    navigationControl: false,
    streetViewControl: false,
    styles:  [{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#747474"},{"lightness":"23"}]},{"featureType":"poi.attraction","elementType":"geometry.fill","stylers":[{"color":"#f38eb0"}]},{"featureType":"poi.government","elementType":"geometry.fill","stylers":[{"color":"#ced7db"}]},{"featureType":"poi.medical","elementType":"geometry.fill","stylers":[{"color":"#ffa5a8"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#c7e5c8"}]},{"featureType":"poi.place_of_worship","elementType":"geometry.fill","stylers":[{"color":"#d6cbc7"}]},{"featureType":"poi.school","elementType":"geometry.fill","stylers":[{"color":"#c4c9e8"}]},{"featureType":"poi.sports_complex","elementType":"geometry.fill","stylers":[{"color":"#b1eaf1"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":"100"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"},{"lightness":"100"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffd4a5"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffe9d2"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"weight":"3.00"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"weight":"0.30"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#747474"},{"lightness":"36"}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#e9e5dc"},{"lightness":"30"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":"100"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#d2e7f7"}]}]
  });

  // Steet View Button
  $('#streetView').click(function(e){
     e.preventDefault();
     single_map.getStreetView().setOptions({visible:true,position:myLatlng});
     // $(this).css('display', 'none')
  });


  // Custom zoom buttons
  var zoomControlDiv = document.createElement('div');
  var zoomControl = new ZoomControl(zoomControlDiv, single_map);

  function ZoomControl(controlDiv, single_map) {

    zoomControlDiv.index = 1;
    single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);

    controlDiv.style.padding = '5px';

    var controlWrapper = document.createElement('div');
    controlDiv.appendChild(controlWrapper);

    var zoomInButton = document.createElement('div');
    zoomInButton.className = "custom-zoom-in";
    controlWrapper.appendChild(zoomInButton);

    var zoomOutButton = document.createElement('div');
    zoomOutButton.className = "custom-zoom-out";
    controlWrapper.appendChild(zoomOutButton);

    google.maps.event.addDomListener(zoomInButton, 'click', function() {
      single_map.setZoom(single_map.getZoom() + 1);
    });

    google.maps.event.addDomListener(zoomOutButton, 'click', function() {
      single_map.setZoom(single_map.getZoom() - 1);
    });

  }


  // Marker
  var singleMapIco =  "<i class='"+$('#singleListingMap').data('map-icon')+"'></i>";

  new CustomMarker(
    myLatlng,
    single_map,
    {
      marker_id: '1'
    },
    singleMapIco
  );


}

function CustomMarker(latlng, map, args, markerIco) {
  this.latlng = latlng;
  this.args = args;
  this.markerIco = markerIco;
  this.setMap(map);
}

</script>



<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpN7ALbslkRAqQEdaS1Bz0J-Tu7e8rzy8&libraries=places&callback=initAutocomplete"></script>
<script type="text/javascript" src="assets/scripts/infobox.min.js"></script>
<script type="text/javascript" src="assets/scripts/markerclusterer.js"></script>
<script type="text/javascript" src="assets/scripts/maps.js"></script>


</body>
</html>