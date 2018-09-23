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
          ใส่ชื่อประเภท รูปภาพประกอบให้ครบ
        </p>
        <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputUsername1">ชื่อประเภทงาน</label>
            <input type="text" class="form-control" name="name_cat" value="{{ old('name_cat')}}" placeholder="ช่างปูน..">
          </div>

          <div class="form-group">
            <label>แก้ไขรูปภาพ</label>
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


@stop('scripts')
