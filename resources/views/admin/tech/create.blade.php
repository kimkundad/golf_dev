@extends('admin.layouts.template')



@section('stylesheet')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<style>
.btn-group-sm>.btn, .btn-sm{
  font-size: 13px;
}
@media (min-width: 576px){
  .modal-dialog {
      max-width: 500px;
      margin: 100px auto;
  }
}

.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
     z-index: 0;
     background: none
}
.note-group-image-url{
  display: none;
}
</style>
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
			<div class="col-lg-10 col-md-offset-1">



        <div class="dashboard-list-box-static">

          <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
              {{ method_field($method) }}
              {{ csrf_field() }}
						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">ชื่อประเภทช่าง</label>
							<input type="text" name="name_cat" placeholder="ช่างปูน, ช่างสี">

              <label class="margin-top-0">รูปประเภทช่าง</label>
              <input type="file" name="image"  class="col-6" style="height:30px;"/>
              <br />
              <label class="margin-top-0">ผลงานที่ผ่านมา</label>
              <textarea id="summernote" name="editordata"></textarea>

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
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script>
      $('#summernote').summernote({
        placeholder: 'Hello bootstrap 4',
        height: 400
      });
    </script>
@stop('scripts')
