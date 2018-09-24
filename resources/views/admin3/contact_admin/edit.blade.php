@extends('admin3.layouts.template')

@section('stylesheet')



@stop('stylesheet')


@section('admin3.content')

<br />

<div class="row">
  <div class="col-md-6 mx-auto grid-margin stretch-card">

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$datahead}}</h4>

        <div class="d-flex align-items-center py-3 border-bottom">
                  <img class="img-sm rounded-circle" src="{{url('assets/tech_img/'.$objs->tech_image)}}" alt="profile">
                  <div class="ml-3">
                    <h6 class="mb-1">{{$objs->tech_fname}} {{$objs->tech_lname}} </h6>
                    <small class="text-muted mb-0"><i class="icon-location-pin-outline mr-1"></i>{{$objs->province_name}} </small>
                  </div>

                </div>
          <br /><br />

        <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                    {{ method_field($method) }}
                    {{ csrf_field() }}

          <div class="form-group">
            <label for="exampleInputUsername1">ชื่อผู้ติดต่อ</label>
            <input type="text" class="form-control" name="name" value="{{$objs->name}}" placeholder="ช่างปูน..">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">เบอร์ติดต่อ</label>
            <input type="text" class="form-control" name="phone" value="{{$objs->phone}}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">อีเมล</label>
            <input type="text" class="form-control" name="email" value="{{$objs->email}}">
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">รายละเอียด</label>
            <textarea class="form-control" id="exampleTextarea1" name="comments" placeholder="ใส่ข้อมูลรายละเอียดของช่างเบื้องต้น..." rows="8" >{{ $objs->comments }}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Note <small class="text-muted mb-0">**สำหรับ admin</small> </label>
            <textarea class="form-control" id="exampleTextarea1" name="note" placeholder="**สำหรับ admin..." rows="8" >{{ $objs->note }}</textarea>
          </div>



          <br />
          <button type="submit" class="btn btn-primary mr-2">บันทึกข้อมูล</button>
          <button class="btn btn-light">ยกเลิก</button>
        </form>
      </div>
    </div>

  </div>
</div>





@stop



@section('scripts')

@if ($message = Session::get('edit_success'))
<script>

  $.toast({
    heading: 'ทำรายการสำเร็จ',
    text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ.',
    showHideTransition: 'slide',
    icon: 'success',
    loaderBg: '#f96868',
    position: 'top-right'
  })

</script>
@endif


@stop('scripts')
