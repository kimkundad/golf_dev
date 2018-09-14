@extends('admin2.layouts.template')





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
          							<div class="col-md-2 col-lg-2">




          							</div>







                        <div class="col-md-8 col-lg-8">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">




          											<h4 class="mb-xlg">จัดการข้อความ </h4>

          											<fieldset>



                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อผู้ติดต่อ*</label>
          													<div class="col-md-8">
          														<p>
                                        {{$objs->name}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">Email*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->email}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เรื่องที่ต้องการติดต่อ*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->subject}}
                                      </p>
          														</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">รายละเอียด*</label>
          													<div class="col-md-8">
                                      <p>
                                        {{$objs->comments}}
                                      </p>
          														</div>
          												</div>









          											</fieldset>











          									</div>
          								</div>
          							</div>
          						</div>









          						</div>




</section>
@stop



@section('scripts')
<script src="{{asset('/assets/javascripts/tables/examples.datatables.default.js')}}"></script>


@if ($message = Session::get('edit_success'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการแก้ไขข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif




@stop('scripts')
