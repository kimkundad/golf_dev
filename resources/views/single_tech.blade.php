@extends('layouts.template')

@section('title')
MASTER PHOTO NETWORK: ร้านมาสเตอร์ อัด ขยาย ภาพ อัดภาพระบบดิจิตอล กรอบลอย canvas FRAME กรอบรูป studio ร้านถ่ายรูป
@stop

@section('stylesheet')
@stop('stylesheet')
@section('content')



<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
	<a href="assets/images/275193-545b1c211e003.jpg" data-background-image="assets/images/275193-545b1c211e003.jpg" class="item mfp-gallery" title="Title 1"></a>
	<a href="assets/images/275193-545b1cd211e003.jpg" data-background-image="assets/images/275193-545b1cd211e003.jpg" class="item mfp-gallery" title="Title 3"></a>
	<a href="assets/images/1232718383.jpg" data-background-image="assets/images/1232718383.jpg" class="item mfp-gallery" title="Title 2"></a>
	<a href="assets/images/1277113934.jpg" data-background-image="assets/images/1277113934.jpg" class="item mfp-gallery" title="Title 4"></a>
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>ช่างแพรวา สุธรรมพงษ์ <span class="listing-tag">ช่างปูกระเบื้อง</span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							ลาดพร้าว, กรุงเทพมหานคร
						</a>
					</span>
					<div class="star-rating" data-rating="5">
						<div class="rating-counter"><a href="#listing-reviews">(31 รีวิว)</a></div>
					</div>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">รายละเอียด</a></li>
					<li><a href="#listing-pricing-list">ผลงานที่ผ่านมา</a></li>
					<li><a href="#listing-location">ตำแหน่งช่าง</a></li>
					<li><a href="#listing-reviews">รีวิว</a></li>
					<li><a href="#add-review2">เงื่อนไขและข้อตกลงในการใช้บริการ</a></li>
				</ul>
			</div>

			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p style="font-size:14px; line-height: 24px;">
          รับทำหลังคาเมทัลชีท ทั้งภายนอกและภายในที่พักอาศัย บ้าน อาคารพาณิชย์ โรงงาน โรงจอดรถ ร้านค้า ร้านอาหาร ทุกรูปแบบ
          มีหลังคาเมทัลชีทให้เลือกหลายแบบ หลายลอน หลากสีสัน ช่วยปกป้องบ้านจากแสงแดดและเพิ่มความสวยงามอีกด้วย เรามีทีมงานพร้อมให้บริการแก่ลูกค้า รับผิดชอบงานไม่ทิ้งงาน ได้งานคุณภาพดีแน่นอน
				</p>

				<p style="font-size:14px; line-height: 24px;">
          รับสร้างบ้าน ต่อเติมบ้าน#งานโครงสร้างเหล็ก#หลังคา#เมทัลชีท#ไม้ระแนง#ฝ้าระแนง#ไม้พื้น#งานทาสี#งานปูกระเบื้อง#งานฝ้าเพดาน#งานเทพื้นคอนกรีต#งานปูนทุกชนิด#งานเคาน์เตอร์ครัว#งานห้องน้ำ#งานก่อสร้างทุกรูปแบบ
        </p>

				<!-- Amenities -->
				<h3 class="listing-desc-headline">ความเชี่ยวชาญ</h3>
				<ul class="listing-features checkboxes margin-top-0">
					<li>ประสบการณ์ 10 ปี</li>
					<li>คำนวณค่าวัสดุ อุปกรณ์</li>
					<li>อุปกรณ์ที่ได้มาตรฐาน</li>
					<li>ทั้งนอกและในอาคาร</li>
					<li>ตรงต่อเวลา</li>
					<li>ราคาต่อรองกันได้</li>
				</ul>
			</div>


			<!-- Food Menu -->
			<div id="listing-pricing-list" class="listing-section">
				<h3 class="listing-desc-headline margin-top-70 margin-bottom-30">ผลงานที่ผ่านมา</h3>

				<div class="show-more">
					<div class="pricing-list-container">

						<!-- Food List -->
						<h4>รายการ</h4>
            <br />
						<ul>
							<h5>ปูกระเบื้องนอกอาคาร</h5>
              <p style="font-size:14px; line-height: 24px;">
                รับปูกระเบื้องราคาถูก ตรม.ละ160บาท เริ่มต้น รับเหมาปูกระเบื้อง โดย ทีม ช่างปูกระเบื้อง ชำนาญงาน
              </p>
              <div class="review-images mfp-gallery-container">
									      <a href="assets/images/275193-545b1c211e003.jpg" class="mfp-gallery"><img src="assets/images/275193-545b1c211e003.jpg" alt=""></a>
                        <a href="assets/images/275193-545b1cd211e003.jpg" class="mfp-gallery"><img src="assets/images/275193-545b1cd211e003.jpg" alt=""></a>
                        <a href="assets/images/1232718383.jpg" class="mfp-gallery"><img src="assets/images/1232718383.jpg" alt=""></a>
                        <a href="assets/images/1277113934.jpg" class="mfp-gallery"><img src="assets/images/1277113934.jpg" alt=""></a>
								</div>
                <hr />
                <h5>ปูกระเบื้องนอกอาคาร</h5>
                <p style="font-size:14px; line-height: 24px;">
                  รับปูกระเบื้องราคาถูก ตรม.ละ160บาท เริ่มต้น รับเหมาปูกระเบื้อง โดย ทีม ช่างปูกระเบื้อง ชำนาญงาน
                </p>
                <div class="review-images mfp-gallery-container">
  									      <a href="assets/images/275193-545b1c211e003.jpg" class="mfp-gallery"><img src="assets/images/275193-545b1c211e003.jpg" alt=""></a>
                          <a href="assets/images/275193-545b1cd211e003.jpg" class="mfp-gallery"><img src="assets/images/275193-545b1cd211e003.jpg" alt=""></a>
                          <a href="assets/images/1232718383.jpg" class="mfp-gallery"><img src="assets/images/1232718383.jpg" alt=""></a>
                          <a href="assets/images/1277113934.jpg" class="mfp-gallery"><img src="assets/images/1277113934.jpg" alt=""></a>
  								</div>
                  <hr />
						</ul>



					</div>
				</div>
				<a href="#" class="show-more-button" data-more-title="ดูเพิ่มเติม" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>
			</div>
			<!-- Food Menu / End -->


			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">ตำแหน่งช่าง</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="13.7085005" data-longitude="100.4063138" data-map-icon="im im-icon-Cool"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>


      <!-- Overview -->
			<div id="add-review2" class="listing-section">
        <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">เงื่อนไขและข้อตกลงในการใช้บริการ</h3>
				<!-- Description -->

        <p style="font-size:14px; line-height: 24px;">
          เอกสารเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้อธิบายข้อมูลที่บริษัทมาสเตอร์ โฟโต้ เน็ตเวิร์ค จำกัด (ต่อไปนี้จะเรียกว่า “บริษัท” “เรา” หรือ “ของเรา”) จะใช้ จะเก็บไว้ จะส่งต่อ หรือจะปกป้องไว้ซึ่งข้อมูลของผู้ใช้งานอย่างไร เอกสารเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้มีผลเฉพาะต่อการใช้งานทางเวปไซด์และการให้บริการทางออนไลน์ของบริษัทเท่านั้น ทางบริษัทขอให้ผู้ใช้งานได้อ่านและทำความเข้าใจในเนื้อหาทั้งหมดของเอกสารเงื่อนไขการให้บริการและนโยบายความเป็นส่วนตัวนี้ก่อนการใช้งานเวปไซด์หรือการบริการทางออนไลน์ เมื่อได้อ่านและทำความเข้าใจแล้ว หากมีส่วนหนึ่งส่วนใดที่ผู้ใช้งานไม่ยินยอม หรือ มีความเห็นต่างจากเงื่อนไขหรือรายละเอียดที่ได้ระบุไว้ ทางบริษัทขอแนะนำให้ผู้ใช้งานหยุดใช้เวปไซด์หรือบริการทางออนไลน์นี้
          </p>

          <p style="font-size:14px; line-height: 24px;">
  ซอฟแวร์ ข้อมูล และเนื้อหาต่างๆที่ปรากฎในเวปไซด์ ได้รับการคุ้มครองตามกฎหมายลิขสิทธิ์และกฎหมายที่ใช้บังคับ ผู้ใช้งานจะไม่นำเนื้อหาทั้งหมดหรือส่วนหนึ่งส่วนใดไปทำการดัดแปลงหรือนำไปใช้โดยที่ไม่ได้รับความยินยอมจากทางบริษัทเป็นหนังสือลายลักษณ์อักษรเสียก่อน ทางบริษัทไม่รับประกันว่าเว็บไซด์และซอฟแวร์จะปลอดจากไวรัส ข้อผิดพลาด หรือภัยคุกคามเช่น ไวรัส เวิร์ม สปายแวร์ หรือโทรจันต่างๆ
            </p>

            <h4>เกี่ยวกับอายุผู้ใช้งาน</h4>
          <p style="font-size:14px; line-height: 24px;">
            บริษัทไม่ได้กำหนดอายุผู้จะใช้งานเวปไซด์หรือการบริการทางออนไลน์ แต่เราแนะนำให้ผู้ใช้งานที่มีอายุต่ำกว่า18 ปีได้รับความยินยอมจากผู้ปกครองก่อนการใช้งาน โดยเฉพาะการให้ข้อมูลบัตรเครดิตเพื่อการสั่งงาน
          </p>
          <hr />
			</div>

			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-35 margin-bottom-20">Reviews </h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

          <div class="fb-comments" data-href="http://9demo.site/single_tech.html" data-numposts="10"></div>
				</section>


			</div>





		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">


			<!-- Verified Badge -->
			<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
				 ติดต่อช่าง
			</div>

			<!-- Book Now -->
			<div class="boxed-widget booking-widget margin-top-35">

				<div class="row with-forms  margin-top-0">

					<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->


					<!-- Panel Dropdown -->
					<div class="col-lg-12">
            	<h4>ปูกระเบื้องนอกอาคาร</h4>
              <br />
            <form method="post" class="register">

            <p class="form-row form-row-wide">
                <input type="text" class="input-text" name="username" placeholder="ชื่อ-นามสกุล" value="" />
            </p>

            <p class="form-row form-row-wide">
                <input type="text" class="input-text" name="username" placeholder="เบอร์โทรติดต่อ" value="" />
            </p>

            <p class="form-row form-row-wide">
                <input type="text" class="input-text" name="username" placeholder="อีเมล์" value="" />
            </p>

            <p class="form-row form-row-wide">
                <textarea name="comments" rows="3" id="comments" placeholder="สถานที่และรายละเอียดงาน ที่ท่านต้องการว่าจ้าง" spellcheck="true" required="required" class="error"></textarea>
            </p>


            <div class="text-center">
              <a href="email_success.html" class="button medium "><i class="fa fa-envelope-o" style="font-size:16px;"></i> ส่งข้อความ</a>
            </div>



            </form>

					</div>
					<!-- Panel Dropdown / End -->

				</div>

				<!-- progress button animation handled via custom.js -->

			</div>
			<!-- Book Now / End -->








		</div>
		<!-- Sidebar / End -->

	</div>
</div>


@endsection

@section('scripts')





<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="assets/css/plugins/datedropper.css" rel="stylesheet" type="text/css">
<script src="assets/scripts/datedropper.js"></script>
<script>$('#booking-date').dateDropper();</script>

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
<script src="assets/scripts/timedropper.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/plugins/timedropper.css">
<script>
this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});


</script>

<!-- Booking Widget - Quantity Buttons -->
<script src="assets/scripts/quantityButtons.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=1512869072370249&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- Maps -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDpN7ALbslkRAqQEdaS1Bz0J-Tu7e8rzy8&sensor=false&amp;language=en"></script>
<script type="text/javascript" src="assets/scripts/infobox.min.js"></script>
<script type="text/javascript" src="assets/scripts/markerclusterer.js"></script>
<script type="text/javascript" src="assets/scripts/maps2.js"></script>

@stop('scripts')
