@extends('layouts.template')

@section('title')
Send Data success
@stop

@section('stylesheet')

@stop('stylesheet')
@section('content')




<div class="container margin-top-60">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 text-center">


        <h3 class="listing-desc-headline "><i class="fa fa-check-circle" style="font-size:120px; color:#00a948"></i></h3>
        <h1>เราได้รับข้อมูลของท่านแล้ว</h1>
        <h3 style="color: #707070;">
          ขอบคุณที่ให้ความสนใจเป็นผู้รับเหมากับเรา<br />
          เจ้าหน้าที่จะติดต่อกลับไปหาท่านตามข้อมูลที่ท่านได้ระบุไว้
        </h3>


        <div class="text-center margin-top-30 margin-bottom-60">
          <a href="{{url('/')}}" class="button medium "><i class="fa fa-envelope-o" style="font-size:16px;"></i> กลับสู่หน้าหลัก</a>
        </div>

			</div>
		</div>

	<div class="row">



	</div>
</div>








@endsection

@section('scripts')

@stop('scripts')
