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
					<h2>ประเภทงาน</h2>
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
			<div class="col-lg-12 col-md-12">
				<a href="{{url('admin/category/create')}}" class="button border with-icon">เพิ่มประเภทช่าง <i class="sl sl-icon-plus"></i></a>
				<div class="dashboard-list-box-static">

          <div class="table-responsive">
          <table class="table ">
            <thead>
              <tr>
                <th>ชื่อประเภทงาน</th>
                <th>จำนวนช่าง</th>
                <th>ช่างแนะนำ</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
							@if($objs)
                @foreach($objs as $u)
              <tr>
                <td>{{$u->name_cat}}</td>
                <td>0</td>
                <td>0</td>
                <td class="text-right">
                  <a href="{{url('admin/category/'.$u->id.'/edit')}}" class="rate-review" style="margin-top:0px;padding: 5px 10px;"><i class="sl sl-icon-note" style="padding-right: 0px;"></i> แก้ไข</a>

                  <a href="{{url('admin/category/del_cat/'.$u->id)}}" onclick="return confirm('คุณต้องการที่จะลบ สิ่งนี้จริงๆ ใช่ไหม?');" class="rate-review" style="margin-top:0px;padding: 5px 10px;"><i class="sl sl-icon-close" style="padding-right: 0px;"></i> ลบ</a>
                </td>
              </tr>
							@endforeach
            @endif

            </tbody>
          </table>
          </div>

				</div>



			</div>



		</div>

	</div>
	<!-- Content / End -->



@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if ($message = Session::get('add_success'))
<script>
swal({
  title: "บันทึกสำเร็จ!",
  text: "คุณทำการบันทึกข้อมูลลงในระบบแล้ว!",
  icon: "success",
  button: false,
	timer: 2000
});
</script>
@endif

@if ($message = Session::get('delete'))
<script>
swal({
  title: "ลบข้อมูลสำเร็จ!",
  text: "คุณทำการลบข้อมูลลงในระบบแล้ว!",
  icon: "success",
  button: false,
	timer: 2000
});
</script>
@endif

@stop('scripts')
