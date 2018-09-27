@extends('layouts.template')

@section('title')
เกี่ยวกับเรา ช่างตกแต่งคอนกรีต
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

<style>
.office-address ul {
    padding: 10px 30px 10px 30px;

}
</style>
@stop('stylesheet')
@section('content')


<div class="container margin-bottom-60" >
	<div class="row">

		<div class="col-md-12">
			<h2 class="headline centered margin-top-75">
				เราคือใคร?

			</h2>
		</div>

	</div>


	<div class="row icons-container">
		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">

				<img src="assets/images/icon_contact1.jpg" alt="" style="width:140px; height:93px">
				<h3>ผู้รับเหมามีผีมือ</h3>

			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<img src="assets/images/icon_contact2.jpg" alt="" style="width:140px; height:93px">
				<h3>ศูนย์รวมผู้รับเหมาทั่วประเทศ</h3>

			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<img src="assets/images/icon_contact3.jpg" alt="" style="width:140px; height:93px">
				<h3>ไม่มีค่าใช้จ่างแฝง</h3>

			</div>
		</div>


    <div class="col-md-10 col-md-offset-1 margin-top-60 text-center">

      <p style="font-size:14px; line-height: 24px;">
        รับทำหลังคาเมทัลชีท ทั้งภายนอกและภายในที่พักอาศัย บ้าน อาคารพาณิชย์ โรงงาน โรงจอดรถ ร้านค้า ร้านอาหาร ทุกรูปแบบ
        มีหลังคาเมทัลชีทให้เลือกหลายแบบ หลายลอน หลากสีสัน ช่วยปกป้องบ้านจากแสงแดดและเพิ่มความสวยงามอีกด้วย เรามีทีมงานพร้อมให้บริการแก่ลูกค้า รับผิดชอบงานไม่ทิ้งงาน ได้งานคุณภาพดีแน่นอน
      </p>

      <p style="font-size:14px; line-height: 24px;">
        รับสร้างบ้าน ต่อเติมบ้าน#งานโครงสร้างเหล็ก#หลังคา#เมทัลชีท#ไม้ระแนง#ฝ้าระแนง#ไม้พื้น#งานทาสี#งานปูกระเบื้อง#งานฝ้าเพดาน#งานเทพื้นคอนกรีต#งานปูนทุกชนิด#งานเคาน์เตอร์ครัว#งานห้องน้ำ#งานก่อสร้างทุกรูปแบบ
      </p>
      <p style="font-size:14px; line-height: 24px;">
        รับทำหลังคาเมทัลชีท ทั้งภายนอกและภายในที่พักอาศัย บ้าน อาคารพาณิชย์ โรงงาน โรงจอดรถ ร้านค้า ร้านอาหาร ทุกรูปแบบ
        มีหลังคาเมทัลชีทให้เลือกหลายแบบ หลายลอน หลากสีสัน ช่วยปกป้องบ้านจากแสงแดดและเพิ่มความสวยงามอีกด้วย เรามีทีมงานพร้อมให้บริการแก่ลูกค้า รับผิดชอบงานไม่ทิ้งงาน ได้งานคุณภาพดีแน่นอน
      </p>
    </div>



	</div>
</div>

<hr />

<div class="container">
  <div class="row">

    <div class="col-md-12">
      <h1 class="headline centered margin-bottom-45">
        ติดต่อสอบถามเพิ่มเติม

      </h1>
    </div>

  </div>
  </div>




<div class="contact-map margin-bottom-60">

	<!-- Google Maps -->
	<div id="singleListingMap-container">
		<div id="singleListingMap" data-latitude="{{get_lat()}}" data-longitude="{{get_lng()}}" data-map-icon="im im-icon-Map2"></div>
		<a href="#" id="streetView">Street View</a>
	</div>
	<!-- Google Maps / End -->

	<!-- Office -->
	<div class="address-box-container">
		<div class="address-container" data-background-image="assets/images/bg_green.png">
			<div class="office-address">
				<h3>{{get_compony()}}</h3>
				<ul style="padding: 10px 30px 10px 30px;">
					<li>{{get_address()}} </li>
					<li>{{get_phone()}} </li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container margin-bottom-60">

	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">Concreate Decor Thailand</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p> เรายินดีให้บริการ
{{title_company()}}</p>

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span>{{get_phone()}} </span></li>
					<li><i class="im im-icon-Fax"></i> <strong>Fax:</strong> <span>{{get_fax()}} </span></li>
					<li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">{{get_website()}}</a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#">{{get_emial()}}</a></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">ส่งข้อความหาเรา</h4>

				<div id="contact-message"></div>

					<form method="post" action="{{url('contact_us')}}" name="contactform" autocomplete="on">
						{{ csrf_field() }}

					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="name" type="text" id="name" value="{{ old('name') }}" placeholder="ชื่อ-นามสกุล" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" value="{{ old('email') }}" placeholder="อีเมล์" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="subject" type="text" id="subject" value="{{ old('subject') }}" placeholder="เรื่องที่ต้องการติดต่อ" required="required" />
					</div>

					<div>
						<textarea name="comments" cols="40" rows="3" id="comments" placeholder="ข้อความ" spellcheck="true" required="required">{{ old('comments') }}</textarea>
					</div>

					<input type="submit" class="submit button" id="submit" value="ส่งข้อความ" />

					</form>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->

@endsection

@section('scripts')

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA89Rb8Kz1ArY3ks6sSvz2cNrn66CHKDiA&sensor=false&amp;language=en"></script>
<script type="text/javascript" src="assets/scripts/infobox.min.js"></script>
<script type="text/javascript" src="assets/scripts/markerclusterer.js"></script>
<script type="text/javascript" >

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

// Single Listing Map Init
var single_map =  document.getElementById('singleListingMap');
if (typeof(single_map) != 'undefined' && single_map != null) {
	google.maps.event.addDomListener(window, 'load',  singleListingMap);
}


function CustomMarker(latlng, map, args, markerIco) {
	this.latlng = latlng;
	this.args = args;
	this.markerIco = markerIco;
	this.setMap(map);
}

CustomMarker.prototype = new google.maps.OverlayView();

CustomMarker.prototype.draw = function() {

	var self = this;

	var div = this.div;

	if (!div) {

		div = this.div = document.createElement('div');
		div.className = 'map-marker-container';

		div.innerHTML = '<div class="marker-container">'+
												'<div class="marker-card">'+
													 '<div class="front face">' + self.markerIco + '</div>'+
													 '<div class="back face">' + self.markerIco + '</div>'+
													 '<div class="marker-arrow"></div>'+
												'</div>'+
											'</div>'


		// Clicked marker highlight
		google.maps.event.addDomListener(div, "click", function(event) {
				$('.map-marker-container').removeClass('clicked infoBox-opened');
				google.maps.event.trigger(self, "click");
				$(this).addClass('clicked infoBox-opened');
		});


		if (typeof(self.args.marker_id) !== 'undefined') {
			div.dataset.marker_id = self.args.marker_id;
		}

		var panes = this.getPanes();
		panes.overlayImage.appendChild(div);
	}

	var point = this.getProjection().fromLatLngToDivPixel(this.latlng);

	if (point) {
		div.style.left = (point.x) + 'px';
		div.style.top = (point.y) + 'px';
	}
};

CustomMarker.prototype.remove = function() {
	if (this.div) {
		this.div.parentNode.removeChild(this.div);
		this.div = null; $(this).removeClass('clicked');
	}
};

CustomMarker.prototype.getPosition = function() { return this.latlng; };

// -------------- Custom Map Marker / End -------------- //

</script>


@stop('scripts')
