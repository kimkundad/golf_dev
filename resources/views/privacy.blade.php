@extends('layouts.template')

@section('title')

@stop

@section('stylesheet')
<style>
.address-container:before {
    content: "";
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    background-color: #333;
    opacity: 0.3;
}
</style>
@stop('stylesheet')
@section('content')


<!-- Map Container -->



<div class="container margin-bottom-60" >
	<div class="row">

		<div class="col-md-12">
			<h2 class="headline centered margin-top-75">
				นโยบายความเป็นส่วนตัว

			</h2>
		</div>

	</div>


	<div class="row icons-container">
		<!-- Stage -->



    <div class="col-md-10 col-md-offset-1 margin-top-60 ">

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
      <h4>เกี่ยวกับอายุผู้ใช้งาน</h4>
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






<div class="contact-map margin-bottom-60">


</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


@endsection

@section('scripts')

<!-- Maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA89Rb8Kz1ArY3ks6sSvz2cNrn66CHKDiA&sensor=false&amp;language=en"></script>
<script type="text/javascript" src="assets/scripts/infobox.min.js"></script>
<script type="text/javascript" src="assets/scripts/markerclusterer.js"></script>
<script type="text/javascript" src="assets/scripts/maps.js"></script>


@stop('scripts')
