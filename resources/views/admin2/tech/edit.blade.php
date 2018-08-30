@extends('admin2.layouts.template')



<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<style>
.note-editor.note-frame .note-editing-area .note-editable{
      padding: 30px;
}
.select2-search-choice-close{
  top: 10px !important;
  color: #999;
    cursor: pointer;
    display: inline-block;
    font-weight: 700;
    margin-right: 3px;
    background:none !important;
}
.select2-search-choice-close:after {
    content: 'x';
    font-size: 10px;
    color: #000!important;
    padding: 0 4px;
    font-weight: bold;
}
</style>
@section('admin2.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



          <div class="row">








                        <div class="col-md-12">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}

          											<h4 class="mb-xlg">แก้ไข ช่างใหม่</h4>

          											<fieldset>
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล*</label>
          													<div class="col-md-4">
          														<input type="text" class="form-control" name="tech_fname" value="{{ $objs->tech_fname }}" placeholder="ชื่อจริง">
          														</div>
                                      <div class="col-md-4">
            														<input type="text" class="form-control" name="tech_lname" value="{{ $objs->tech_lname }}" placeholder="นามสกุล">
            														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Email-เบอร์โทร*</label>
          													<div class="col-md-4">
          														<input type="text" class="form-control" name="tech_email" value="{{ $objs->tech_email }}" placeholder="Example@gmail.com">
          														</div>
                                      <div class="col-md-4">
            														<input type="text" class="form-control" name="tech_phone" value="{{ $objs->tech_phone }}" placeholder="081-100-775x">
            														</div>
          												</div>

                                  <hr />
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ตำบล*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="tumbon" value="{{ $objs->tumbon }}" placeholder="ตำบลหนองไผ่">
          														</div>

          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">อำเภอ*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="district" value="{{ $objs->district }}" placeholder="อำเภอแม่ปิง">
          														</div>

          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">จังหวัด*</label>
          													<div class="col-md-8">
          														<select name="province_id" class="form-control mb-md" required>

                                        <option value="">-- เลือกจังหวัด --</option>
  								                        @foreach($province_th as $x)
  													                 <option value="{{$x->id}}"
                                               @if($objs->province_id == $x->id)
                                               selected='selected'
                                               @endif
                                               >{{$x->province_name}}</option>
  													              @endforeach
  								                    </select>
          								            </select>
          													</div>
          												</div>





                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รหัสไปรษณีย์*</label>
          													<div class="col-md-8">
          														<input type="text" class="form-control" name="zip_code" value="{{ $objs->zip_code }}" placeholder="10310">
          														</div>

          												</div>




                                  <hr />
                                  <div class="col-md-12">
                                    <p>
                                      เลือก ประเภทช่าง ได้มากกว่า 1 ทางเลือก
                                      <br />
                                    </p>
                                  </div>



                                  @foreach($category as $categorys)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1"></label>
                                      <div class="col-md-8">
                                  <div class="checkbox-custom checkbox-primary">
                                   <input type="checkbox" name="category[]" id="checkboxExample2" @if($categorys->options == 1) checked="" @endif value="{{$categorys->id}}">
                                   <label for="checkboxExample2">{{$categorys->name_cat}}</label>
                                 </div>
                                 </div>
                                   </div>
                                  @endforeach
                                  <br />
                                  <br />



                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">ระดับดาวของช่าง*</label>
          													<div class="col-md-8">
          														<select name="tech_rating" class="form-control mb-md" required>

                                        <option value="1"
                                        @if( $objs->tech_rating == 1)
                                        selected='selected'
                                        @endif
                                        >1 ดาว</option>
                                        <option value="2"
                                        @if( $objs->tech_rating == 2)
                                        selected='selected'
                                        @endif
                                        >2 ดาว</option>
                                        <option value="3"
                                        @if( $objs->tech_rating == 3)
                                        selected='selected'
                                        @endif
                                        >3 ดาว</option>
                                        <option value="4"
                                        @if( $objs->tech_rating == 4)
                                        selected='selected'
                                        @endif
                                        >4 ดาว</option>
                                        <option value="5"
                                        @if( $objs->tech_rating == 5)
                                        selected='selected'
                                        @endif
                                        >5 ดาว</option>

  								                    </select>
          								            </select>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย*</label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="tech_detail" rows="5">{{ $objs->tech_detail }}</textarea>
          														</div>
          												</div>
                                  <br />
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รูปหลักช่าง*</label>
          													<div class="col-md-8">
          														<img src="{{url('assets/tech_img/'.$objs->tech_image)}}" class="img-responsive img-circle" style="width:40%" />
          														</div>
          												</div>




                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">รูปหลักช่าง*</label>
                                    <div class="col-md-8">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                              <div class="input-append">
                                                <div class="uneditable-input">
                                                  <i class="fa fa-file fileupload-exists"></i>
                                                  <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                  <span class="fileupload-exists">Change</span>
                                                  <span class="fileupload-new">Select file</span>
                                                  <input type="file" name="image">
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                              </div>
                                            </div>
                                            </div>
                                  </div>

                                  <hr />
                                  <div class="col-md-12">
                                    <p>
                                      เลือก ความเชี่ยวชาญ ได้มากกว่า 1 ทางเลือก
                                      <br />
                                    </p>
                                  </div>



                                  @foreach($skill as $option_products)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1"></label>
                                      <div class="col-md-8">
                                  <div class="checkbox-custom checkbox-primary">
                                   <input type="checkbox" name="option[]" id="checkboxExample2" @if($option_products->options == 1) checked="" @endif value="{{$option_products->id}}">
                                   <label for="checkboxExample2">{{$option_products->skill_name}}</label>
                                 </div>
                                 </div>
                                   </div>
                                  @endforeach
                                  <br />
                                  <br />

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ผลงานที่ผ่านมา*</label>
          													<div class="col-md-8">
          														<textarea class="form-control" id="summernote" name="tech_project" rows="6">{{$objs->tech_project}}</textarea>
          														</div>
          												</div>









          											</fieldset>







          											<div class="panel-footer">
          												<div class="row">
          													<div class="col-md-9 col-md-offset-3">
          														<button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
          														<button type="reset" class="btn btn-default">ยกเลิก</button>
          													</div>
          												</div>
          											</div>

          										</form>

          									</div>
          								</div>
          							</div>
          						</div>









          						</div>




</section>
@stop



@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
$(document).ready(function() {
  $('#summernote').summernote({
    placeholder: 'ผลงานที่ผ่านมา ของช่าง',
    minHeight: 300
  });
  var content = {!! json_encode($objs->tech_project) !!};

            //set the content to summernote using `code` attribute.
  $('#summernote').summernote('code', content);
});
</script>



@if ($message = Session::get('success'))
<script type="text/javascript">

$(document).ready(function() {
  $('#summernote').summernote();
});

var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
var notice = new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success',
      addclass: 'stack-bar-top',
      stack: stack_bar_top,
      width: "100%"
    });
</script>
@endif


@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif

@stop('scripts')
