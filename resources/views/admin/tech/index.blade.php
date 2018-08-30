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
        <h2>ช่างในระบบ</h2>
        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="#">Home</a></li>
            <li>ช่างในระบบ</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>






  <div class="row">

    <!-- Listings -->
    <div class="col-lg-12 col-md-12">
      <a href="{{url('admin/tech_list/create')}}" class="button border with-icon">เพิ่มช่าง <i class="sl sl-icon-plus"></i></a>
      <div class="dashboard-list-box margin-top-0">

        <!-- Sort by -->
        <div class="sort-by">
          <div class="sort-by-select">
            <select data-placeholder="Default order" class="chosen-select-no-single">
              <option>ดูทั้งหมด</option>
              <option>ยืนยันแล้ว</option>
              <option>รอการยืนยัน</option>
              <option>ไม่ผ่าน</option>
            </select>
          </div>
        </div>




        <h4>List ช่างทั้งหมด ({{$count_tech}})</h4>
        <ul>

          @if($objs)
            @foreach($objs as $u)

          <li class="pending-booking">
            <div class="list-box-listing bookings">
              <div class="list-box-listing-img"><img src="{{url('assets/tech_img/'.$u->tech_image)}}" alt=""></div>
              <div class="list-box-listing-content">
                <div class="inner">
                  <h3>{{$u->tech_fname}} {{$u->tech_lname}}<span class="booking-status pending">รอการยืนยัน</span></h3>

                  <div class="inner-booking-list">
                    <h5>สมัครวัน:</h5>
                    <ul class="booking-list">
                      <li class="highlighted">{{$u->created_at}}</li>
                    </ul>
                  </div>

                  <div class="inner-booking-list">
                    <h5>ประเภทงาน:</h5>
                    <ul class="booking-list">
                      @foreach($u->options as $j)
                      <li class="highlighted">{{$j->name_cat}}</li>
                      @endforeach
                    </ul>
                  </div>

                  <div class="inner-booking-list">
                    <h5>จังหวัด:</h5>
                    <ul class="booking-list">
                      <li>{{$u->province_name}}</li>
                      <li>{{$u->tech_email}}</li>
                      <li>{{$u->tech_phone}}</li>
                    </ul>
                  </div>



                </div>
              </div>
            </div>
            <div class="buttons-to-right">
              <a href="{{url('admin/tech/'.$u->id_te)}}" class="button gray approve"><i class="sl sl-icon-user"></i> ดูข้อมูล</a>
              <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> ยกเลิก</a>
              <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> ยืนยัน</a>
            </div>
          </li>

          @endforeach
        @endif





        </ul>
      </div>






      <!-- Pagination -->
      <div class="clearfix"></div>
      <div class="pagination-container margin-top-30 margin-bottom-0">
        {{ $objs->links() }}
      </div>
      <!-- Pagination / End -->



    </div>


    <!-- Copyrights -->
    <div class="col-md-12">
      <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
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
