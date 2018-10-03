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
        <p class="card-description text-muted card-text">
          ใส่ชื่อผู้เข้าใช้ระบบ รูปภาพประกอบให้ครบ
        </p>
        <form id="commentForm" method="POST" action="{{$url}}" enctype="multipart/form-data">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputUsername1">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" name="name" value="{{$objs->name}}" required>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">อีเมล</label>
            <input type="email" class="form-control" name="email" value="{{$objs->email}}" required>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">รูปภาพ</label>
            <div class="col-sm-9">
              <img src="{{url('assets/images/avatar/'.$objs->avatar)}}" class="img-fluid rounded" style="width:60%" />
            </div>
          </div>

          <br />



          <div class="form-group">
            <label>รูป Avatar (*แนะนำเป็น รุปสี่เหลี่ยมด้านเท่า 250 x 250 px) </label>
            <label class="text-success">**ระบบจะทำการสุ่มรูปให้ในกรณีที่ไม่ใส่รูป</label>
            <input type="file" name="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
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

<script>

$("#commentForm").validate({
  errorPlacement: function(label, element) {
    label.addClass('mt-2 text-danger');
    label.insertAfter(element);
  },
  highlight: function(element, errorClass) {
    $(element).parent().addClass('has-danger')
    $(element).addClass('form-control-danger')
  }
});

</script>

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
