<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>ค้นหาช่าง ในเว็บไซต์ ช่างตกแต่งคอนกรีต</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{url('assets/css/style.css')}}">
<link rel="stylesheet" href="{{url('assets/css/colors/green.css')}}" id="colors">
<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
<link rel="stylesheet" href="{{url('assets/autoComplete/auto-complete.css')}}">
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
					<a href="{{url('/')}}"><img src="{{url('assets/image/logo_website/'.get_logo())}}" alt="{{get_compony()}}"></a>
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


						<form  method="POST" action="{{url('search')}}">
							{{ csrf_field() }}
							<!-- Row With Forms -->
							<div class="row with-forms">

								<!-- Main Search Input -->
								<div class="col-fs-6">
									<div class="input-with-icon">
										<i class="sl sl-icon-magnifier"></i>
										<input type="text" placeholder="ค้นหาช่าง" id="hero-demo2" name="search" value="{{$search}}"/>
									</div>
								</div>

								<!-- Main Search Input -->
								<div class="col-fs-6">
									<div class="input-with-icon location">
										<div id="autocomplete-container">
											<input id="autocomplete-input" type="text" name="location" value="{{$location}}" placeholder="อำเภอ, จังหวัด">
											<input id="lat" type="hidden" name="lat" value="{{ ( $lat ?: '13.7211075')}}" />
											<input id="lng" type="hidden" name="lng" value="{{ ( $lon ?: '100.5904873') }}" />
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
												<div class="col-md-12">

													<div class="col-md-6">
													<input id="check-0" type="checkbox" name="cat_id[]" value="0" @if($cat_id[0] == 0) checked @endif class="all">
													<label for="check-0">ค้นหาทั้งหมด</label>
													</div>

													@if($category)
														@foreach($category as $u)

														<div class="col-md-6">
														<input id="check-{{$u->id}}" type="checkbox" name="cat_id[]" value="{{$u->id}}"
														@if(isset($u->option))
														checked
														@endif
														>
														<label for="check-{{$u->id}}">{{$u->name_cat}}</label>
														</div>

														@endforeach
													@endif







												</div>


											</div>

											<!-- Buttons -->


										</div>
									</div>
									<!-- Panel Dropdown / End -->

									<!-- Panel Dropdown -->
									<div class="panel-dropdown wide">
										<a href="#">ระยะทางจากจุดค้นหา</a>
                    <div class="panel-dropdown-content">
											<input class="distance-radius" name="radius" type="range" min="1" max="100" step="1" value="{{$radius}}" data-title="Radius around selected destination">
											<div class="panel-buttons">
												<button class="panel-cancel">Disable</button>
												<button class="panel-apply">Apply</button>
											</div>
										</div>
									</div>
									<!-- Panel Dropdown / End -->

									<div class="panel-dropdown" style="margin-bottom: -12px;">
									<div class="panel-buttons">

										<button class="panel-apply" type="submit">ค้นหา</button>
									</div>
									</div>



								</div>
								<!-- Filters / End -->



							</div>
							<!-- Row With Forms / End -->


							</form>




					</div>
				</div>

			</section>
			<!-- Search / End -->


		<section class="listings-container margin-top-30">
			<!-- Sorting / Layout Switcher -->
			<div class="row fs-switcher">

				<div class="col-md-6">
					<!-- Showing Results -->
					<p class="showing-results">{{$tech_count}} ผลการค้นหา </p>
				</div>

			</div>

<style>
@media (max-width: 767px){
  .listing-item-content span {
    font-size: 14px;
}
.listing-item-content h3{
  font-size: 14px;
}
.tech_avatar{
  bottom: -35px;
}
}
@media (min-width: 992px) {
  .tech_avatar{
  bottom: 20px;
}
@media (min-width: 1240px) {
	.tech_avatar{
  bottom: 20px;
}
}

}


</style>

			<!-- Listings -->
			<div class="row fs-listings">


				@if($tech)
					@foreach($tech as $u)
				<!-- Listing Item -->
				<div class="col-lg-12 col-md-12">
					<div class="listing-item-container list-layout" data-marker-id="{{$u->id_tech}}">
						<a href="{{url('single_tech/'.$u->id_tech)}}" class="listing-item">

							<!-- Image -->
							<div class="listing-item-image">
								<img src="{{url('assets/tech_img/'.$u->tech_imgs)}}" alt="{{$u->tech_fname}} {{$u->tech_lname}}">
								<span class="tag">
								@if($u->cat_tech)
								@foreach($u->cat_tech as $j)
								{{$j->name_cat_for}},
								@endforeach
								@endif
								</span>
							</div>

							<!-- Content -->
							<div class="listing-item-content">

								<div class="listing-item-inner">
									<h3 style="line-height: 25px;">{{$u->tech_detail}} </h3>
									<span style="font-size: 14px; color:#efba04"><i class="fa fa-map-marker"></i> {{$u->tech_prov}} <span style="color:#888; font-size: 14px;">({{$u->tech_view}} เข้าดู)</span> </span>

								</div>

                <div class="star-rating pull-right" style="margin-right:10px; padding-top:18px;" >
                  <div class="rating-counter" style="font-size:12px;"></div>
                </div>

                <div class="avatar tech_avatar" style="position: inherit; padding: 0 10px 0 0;  position: absolute; padding-left:25px;">
									<img src="{{url('assets/tech_img/'.$u->tech_image)}}" alt="" style="height: 60px; width: 60px;border-radius: 50%;">

                  <span style="color:#000">{{$u->tech_fname}} {{$u->tech_lname}}</span><br />
								</div>


							</div>
						</a>
					</div>
				</div>
				<!-- Listing Item / End -->
					@endforeach
				@endif






			</div>
			<!-- Listings Container / End -->

			<style>
			.fs-listings .pagination ul li a.active, .fs-listings .pagination .active, .fs-listings .pagination ul li a:hover, .fs-listings .pagination-next-prev ul li a:hover {
			    background-color: #e8e8e8;
			    color: #333;
					width: 52px;
			    height: 52px;
					border-radius: 50%;
			}
			.fs-listings .pagination ul li a.disabled, .fs-listings .pagination .disabled, .fs-listings .pagination ul li a:hover, .fs-listings .pagination-next-prev ul li a:hover {

					width: 52px;
			    height: 52px;
					border-radius: 50%;
			}
			.pagination ul li span{
    border-radius: 50%;
    width: 52px;
    height: 52px;
    padding: 0;
    line-height: 52px;
}
			</style>

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
									{{$tech->links()}}
								</nav>

							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Pagination / End -->

					<!-- Copyrights -->
					<div class="copyrights margin-top-0">© 2019 Listeo. All Rights Reserved.</div>

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
<script type="text/javascript" src="{{url('assets/scripts/jquery-2.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/custom.js')}}"></script>
<script src="{{url('assets/autoComplete/auto-complete.js')}}"></script>
<script>


    var xhr3;
    new autoComplete({
        selector: 'input[name="search"]',
        minChars: 1,
        source: function(term, response){

            xhr3 = $.getJSON('{{url('/search/data2/')}}', { field3: term }, function(data){
              //secure_url
              response(data.data);
            });
        }
    });


</script>

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
        //  map.fitBounds(bounds);



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







  // Infobox Output
  function locationData(locationURL,locationImg,locationTitle, locationAddress, locationRating, locationRatingCounter) {
      return(''+
        '<a href="'+ locationURL +'" class="listing-img-container">'+
           '<div class="infoBox-close"><i class="fa fa-times"></i></div>'+
           '<img src="'+locationImg+'" alt="">'+

           '<div class="listing-item-content">'+
              '<h3>'+locationTitle+'</h3>'+
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

		@if($tech)
			@foreach($tech as $u)
    [ locationData('single_tech/{{$u->id_tech}}','{{url('assets/tech_img/'.$u->tech_imgs)}}',"{{$u->tech_fname}} {{$u->tech_lname}}", '{{$u->tech_rating}}', '{{$u->tech_view}}'),
		{{$u->lat}}, {{$u->lng}}, {{$u->id_tech}}, '<img src="{{url('assets/tech_img/'.$u->tech_image)}}" style="height: 36px; width:36px; border-radius: 50%;">'],
			@endforeach
		@endif

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
    zoom: 8,
    scrollwheel: scrollEnabled,
    center: new google.maps.LatLng({{ ( $lat ?: '13.7211075')}}, {{ ( $lon ?: '100.5904873') }} ),
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
<script src="https://maps.googleapis.com/maps/api/js?key={{env('google_map')}}&libraries=places&callback=initAutocomplete&signed_in=true"></script>
<script type="text/javascript" src="{{url('assets/scripts/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/maps.js')}}"></script>


</body>
</html>
