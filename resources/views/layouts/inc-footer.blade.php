
<!-- Footer
================================================== -->
<div id="footer" class="sticky-footer" style="background-image: url('{{url('assets/images/bg_footer.png')}}'); background-position: center bottom; background-repeat: repeat-x;">
	<!-- Main -->
	<div class="container">
		<div class="row">


			<div class="col-md-7 col-sm-6 {{ (Request::is('about') ? 'hidden' : '') }} {{ (Request::is('regis_tech') ? 'hidden' : '') }}">
				<img src="{{url('assets/images/popular-location-02.jpg')}}" />
			</div>

			<div class="col-md-5 col-sm-6 text-right {{ (Request::is('about') ? 'hidden' : '') }} {{ (Request::is('regis_tech') ? 'hidden' : '') }}">
				<h1>เรื่องราวเกี่ยวกับเรา<br>
				<p>{{title_company()}}</p>

		<a href="{{url('regis_tech')}}" class="button  with-icon btn-lg pull-right" style="color: #fff;padding: 15px 28px;">อ่านเพิ่มเติม</a>

			</div>




		</div>

		<!-- Copyright -->
		<div class="row" style="margin-top: 320px;">

			<div class="text-center" style="margin-top: -80px;">
        <p style="color:#fff; font-size:13px;">{{get_compony()}} {{get_address()}} {{get_phone()}}</p>
      </div>

			<div class="col-md-6 text-left">
				<p style="color:#fff; font-size:13px;">© 2019 Listeo. All Rights Reserved.</p>
			</div>

			<div class="col-md-6 text-right">
				<a href="{{url('terms_conditions')}}" class="sign-in" style="color:#fff; font-size:14px;"> เงื่อนไขและข้อตกลงในการใช้บริการ</a>
				<a href="{{url('privacy')}}" class="sign-in" style="color:#fff; font-size:14px;"> นโยบายความเป็นส่วนตัว</a>
			</div>

		</div>

	</div>

</div>
<!-- Footer / End -->
