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

        @if (count($errors) > 0)
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

        <form id="commentForm" method="POST" action="{{$url}}" enctype="multipart/form-data">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputUsername1">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" name="name" value="{{ old('name')}}" required>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">อีเมล</label>
            <input type="email" class="form-control" name="email" value="{{ old('email')}}" required>
          </div>

          <br />

          <div class="form-group">
            <label for="exampleInputUsername1">Password</label>
            <input type="password" class="form-control" name="password"  placeholder="ใส่พาสเวิร์ด 6 ตัว" required>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation"  placeholder="ใส่พาสเวิร์ด 6 ตัว" required>
          </div>

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


@stop('scripts')
