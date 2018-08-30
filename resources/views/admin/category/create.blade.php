@extends('admin.layouts.template')



@section('stylesheet')

@stop('stylesheet')
@section('content')


<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>{{$datahead}}</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
							<li>ประเภทงาน</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>






		<div class="row">

      <!-- Listings -->
			<div class="col-lg-6 col-md-offset-3">

        <div class="dashboard-list-box-static">

          <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}
						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">ชื่อประเภทช่าง</label>
							<input type="text" name="name_cat" placeholder="ช่างปูน, ช่างสี">

              <label class="margin-top-0">รูปประเภทช่าง</label>
              <input type="file" name="image" />

							<button type="submit" class="button margin-top-15">บันทึกข้อมูล</button>
						</div>

            </form>

					</div>



			</div>



		</div>



  </div>

	</div>
	<!-- Content / End -->



@endsection

@section('scripts')



@stop('scripts')
