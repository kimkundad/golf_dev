@extends('layouts.template')

@section('title')
{{$tech->tech_fname}} {{$tech->tech_lname}}
@stop


@section('og_tag')
<meta property="og:url" content="{{url('/single_tech/'.$tech->id_tech)}}">
<meta property="og:title" content="สนใจติดต่อช่าง {{$tech->tech_fname}} {{$tech->tech_lname}}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{url('assets/tech_img/'.$tech_imgs)}}">
<meta property="og:description" content="{{$tech->tech_detail}}">
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="314" />
<meta property="fb:admins" content="100002037238809">
<meta property="fb:app_id" content="306775720112722">
@stop

@section('stylesheet')

@stop('stylesheet')
@section('content')



<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
	@if($tech_img)
		@foreach($tech_img as $u)
			<a href="{{url('assets/tech_img/'.$u->image)}}" data-background-image="{{url('assets/tech_img/'.$u->image)}}" class="item mfp-gallery" ></a>
		@endforeach
	@endif


</div>


<!-- Content
================================================== -->
<div class="container" id="wrap">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>{{$tech->tech_fname}} {{$tech->tech_lname}}

						@if($tech_cat)
							@if($tech_cat_count > 0)
							@foreach($tech_cat as $j)
								<a href="{{url('search_tag/'.$j->name_cat_id)}}"><span class="listing-tag">{{$j->name_cat_for}}</span></a>
							@endforeach
							@endif
						@endif


					</h2>
					<span>
						<a href="#listing-location" class="listing-address" style="color:#efba04">
							<i class="fa fa-map-marker"></i>
							จังหวัด : {{$tech->province_ths->province_name}} <span style="color:#888; font-size: 14px;">({{$tech->tech_view}} เข้าดู)</span> 
						</a>
					</span>
					
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
          {{$tech->tech_detail}}
				</p>



				<!-- Amenities -->
				<h3 class="listing-desc-headline">ความเชี่ยวชาญ</h3>
				<ul class="listing-features checkboxes margin-top-0">
					@if($tech_skill)
						@foreach($tech_skill as $k)
					<li>{{$k->option_skill}}</li>
						@endforeach
					@endif
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

							@if($job_all)
							@foreach($job_all as $job)
							<h5>{{$job->name_job}}</h5>
                <p style="font-size:14px; line-height: 24px;">
                  {{$job->detail_job}}
                </p>
                <div class="review-images mfp-gallery-container">
				<div class="row">
				@if($job->img)
									@foreach($job->img as $job_img)
					<div class="col-md-2">
					<a href="{{url('assets/job_img/'.$job_img->image)}}" class="mfp-gallery"><img src="{{url('assets/job_img/'.$job_img->image)}}" alt=""></a>
					</div>
					@endforeach
                          			@endif
				</div>
									
  									      
									
  								</div>
                  <hr />
									@endforeach
																	@endif
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
					<div id="singleListingMap" data-latitude="{{$tech->lat}}" data-longitude="{{$tech->lng}}" data-map-icon="im im-icon-Cool"></div>
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

          <div class="fb-comments" data-width="100%" data-href="{{url('single_tech/'.$tech->id_tech)}}" data-numposts="10"></div>
				</section>


			</div>





		</div>

		<style>
		.fix-search {
    position: fixed;
		top: 500px;
  }
	input, input[type="text"], input[type="password"], input[type="email"], input[type="number"], textarea, select {
    height: 41px;
    line-height: 51px;
    padding: 0 20px;
    outline: none;
    font-size: 15px;
    color: #808080;
    margin: 0 0 16px 0;
    max-width: 100%;
    width: 100%;
    box-sizing: border-box;
    display: block;
    background-color: #fff;
    border: 1px solid #dbdbdb;
    box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 0.06);
    font-weight: 500;
    opacity: 1;
    border-radius: 3px;
}
		</style>

		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

			<div class="hidden-sm hidden-xs" id="navigation-fix">


			<!-- Verified Badge -->
			<div class="verified-badge " >
				 ติดต่อช่าง
			</div>

			<!-- Book Now -->
			<div class="boxed-widget booking-widget margin-top-25" style="padding: 18px 25px 18px 25px;">

				<div class="row with-forms  margin-top-0">

					<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->


					<!-- Panel Dropdown -->
					<div class="col-lg-12">
					<!--		<div class="pull-left">
								<h5 >ชื่อผู้รับเหมา</h3>
								<h4 style="font-size: 16px;">{{$tech->tech_fname}} {{$tech->tech_lname}}</h4>


							</div>
							<img class="pull-right" style="border-radius: 50%; height:60px;" src="{{url('assets/tech_img/'.$tech->tech_image)}}" alt="">
							<div style="padding-top:60px;">
								<hr />
							</div> -->



            	<h4 style="margin-bottom:0px;margin-top: 0px;">ข้อมูลผู้ว่าจ้าง</h4>

            <form action="{{url('post_to_tech')}}" id="my_form" method="post" class="register">
							{{ csrf_field() }}
            <p class="form-row form-row-wide" style="margin: 0 0 13px;">.
							@if($errors->has('name'))
							<span class="text-danger">*กรอก ชื่อ-นามสกุล</span>
							@endif
                <input type="text" class="input-text" name="name" placeholder="ชื่อ-นามสกุล"  required/>
								<input type="hidden" class="input-text" name="tech_id" value="{{$tech->id_tech}}"  required/>

            </p>

            <p class="form-row form-row-wide" style="margin: 0 0 13px;">
							@if($errors->has('phone'))
							<span class="text-danger">*กรอก เบอร์โทรติดต่อ</span>
							@endif
                <input type="text" class="input-text" name="phone" placeholder="เบอร์โทรติดต่อ"  required/>

            </p>

            <p class="form-row form-row-wide" style="margin: 0 0 13px;">
							@if($errors->has('email'))
							<span class="text-danger">*กรอก อีเมล์</span>
							@endif
                <input type="text" class="input-text" name="email" placeholder="อีเมล์"  required/>

            </p>

            <p class="form-row form-row-wide" style="margin: 0 0 13px;">
							@if($errors->has('comments'))
							<span class="text-danger">*กรอก ข้อมูลเบื้องต้น</span>
							@endif
                <textarea name="comments" rows="3" id="comments" placeholder="สถานที่และรายละเอียดงาน ที่ท่านต้องการว่าจ้าง" spellcheck="true" required="required" class="error" ></textarea>

						</p>


            <div class="text-center">
              <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="button medium "><i class="fa fa-envelope-o" style="font-size:16px;"></i> ส่งข้อความ</a>
            </div>



            </form>

					</div>
					<!-- Panel Dropdown / End -->

				</div>

				<!-- progress button animation handled via custom.js -->

			</div>
			<!-- Book Now / End -->


			</div>




			<div class="visible-sm visible-xs">

				<!-- Verified Badge -->
				<div class="verified-badge " >
					 ติดต่อช่าง
				</div>

				<!-- Book Now -->
				<div class="boxed-widget booking-widget margin-top-25" style="padding: 18px 25px 18px 25px;">

					<div class="row with-forms  margin-top-0">

						<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->


						<!-- Panel Dropdown -->
						<div class="col-lg-12">
						<!--		<div class="pull-left">
									<h5 >ชื่อผู้รับเหมา</h3>
									<h4 style="font-size: 16px;">{{$tech->tech_fname}} {{$tech->tech_lname}}</h4>


								</div>
								<img class="pull-right" style="border-radius: 50%; height:60px;" src="{{url('assets/tech_img/'.$tech->tech_image)}}" alt="">
								<div style="padding-top:60px;">
									<hr />
								</div> -->



	            	<h4 style="margin-bottom:0px;margin-top: 0px;">ข้อมูลผู้ว่าจ้าง</h4>

	            <form action="{{url('post_to_tech')}}" id="my_form" method="post" class="register">
								{{ csrf_field() }}
	            <p class="form-row form-row-wide" style="margin: 0 0 13px;">.
								@if($errors->has('name'))
								<span class="text-danger">*กรอก ชื่อ-นามสกุล</span>
								@endif
	                <input type="text" class="input-text" name="name" placeholder="ชื่อ-นามสกุล"  required/>
									<input type="hidden" class="input-text" name="tech_id" value="{{$tech->id_tech}}"  required/>

	            </p>

	            <p class="form-row form-row-wide" style="margin: 0 0 13px;">
								@if($errors->has('phone'))
								<span class="text-danger">*กรอก เบอร์โทรติดต่อ</span>
								@endif
	                <input type="text" class="input-text" name="phone" placeholder="เบอร์โทรติดต่อ"  required/>

	            </p>

	            <p class="form-row form-row-wide" style="margin: 0 0 13px;">
								@if($errors->has('email'))
								<span class="text-danger">*กรอก อีเมล์</span>
								@endif
	                <input type="text" class="input-text" name="email" placeholder="อีเมล์"  required/>

	            </p>

	            <p class="form-row form-row-wide" style="margin: 0 0 13px;">
								@if($errors->has('comments'))
								<span class="text-danger">*กรอก ข้อมูลเบื้องต้น</span>
								@endif
	                <textarea name="comments" rows="3" id="comments" placeholder="สถานที่และรายละเอียดงาน ที่ท่านต้องการว่าจ้าง" spellcheck="true" required="required" class="error" ></textarea>

							</p>


	            <div class="text-center">
	              <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="button medium "><i class="fa fa-envelope-o" style="font-size:16px;"></i> ส่งข้อความ</a>
	            </div>



	            </form>

						</div>
						<!-- Panel Dropdown / End -->

					</div>

					<!-- progress button animation handled via custom.js -->

				</div>
				<!-- Book Now / End -->

			</div>





		</div>
		<!-- Sidebar / End -->

	</div>
</div>


@endsection

@section('scripts')





<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="{{url('assets/css/plugins/datedropper.css')}}" rel="stylesheet" type="text/css">
<script src="{{url('assets/scripts/datedropper.js')}}"></script>
<script>$('#booking-date').dateDropper();</script>

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
<script src="{{url('assets/scripts/timedropper.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{url('assets/css/plugins/timedropper.css')}}">
<script>
this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});



var elementPosition = $('#wrap').offset();

$(window).scroll(function(){

console.log(wrap)

			if($(window).scrollTop() > elementPosition.top){
						$('#navigation-fix').css('position','fixed').css('width','24.5%').css('top','100px');
			} else {
					$('#navigation-fix').css('position','static').css('width','100%');
			}

});

</script>

<!-- Booking Widget - Quantity Buttons -->
<script src="{{url('assets/scripts/quantityButtons.js')}}"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=306775720112722&autoLogAppEvents=1&signed_in=true';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- Maps -->

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{env('google_map')}}&sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{url('assets/scripts/infobox.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/markerclusterer.js')}}"></script>
<script type="text/javascript" src="{{url('assets/scripts/maps2.js')}}"></script>

@stop('scripts')
