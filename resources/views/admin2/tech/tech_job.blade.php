@extends('admin2.layouts.template')



<link href="{{URL::asset('back/assets/upload_image/css/fileinput.css')}}" rel="stylesheet">
<style>
						.btn-file{
							width: 130px;
						}
html .wizard-progress.wizard-progress-lg ul li a, html.dark .wizard-progress.wizard-progress-lg ul li a:hover {
    text-decoration: none;
    background: none;
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








                        <div class="col-md-10 col-md-offset-1">

                          <section class="panel">
                            <div class="panel-body">

                              <div class="wizard-progress wizard-progress-lg">
																	<div class="steps-progress">
																		<div class="progress-indicator" style="width: {{$proocess}}%;"></div>
																	</div>
																	<ul class="nav wizard-steps">
																		<li class="nav-item active ">
																			<a class="nav-link" href="{{url('admin/tech_list/'.$id.'/edit')}}"><span>1</span>ข้อมูลช่าง</a>
																		</li>
																		<li class="nav-item
                                    @if($img_count > 0)
                                    active
                                    @endif
                                     ">
																			<a class="nav-link" href="{{url('admin/tech_gallery/'.$id)}}"><span>2</span>รูปภาพประกอบ</a>
																		</li>
																		<li class="nav-item   @if($job_count > 0)
                                      active
                                      @endif completed">
																			<a class="nav-link " href="{{url('admin/tech_job/'.$id)}}"><span>3</span>ผลงานช่าง</a>
																		</li>
																		<li class="nav-item @if($success > 0)
                                    active
                                    @endif">
																			<a class="nav-link" ><span>4</span>สำเร็จ</a>
																		</li>
																	</ul>
																</div>
                                <br />

                      <form  method="POST" action="{{url('admin/add_jobs_tech')}}" enctype="multipart/form-data">

  		                {{ csrf_field() }}

  		                <div class="row">
                        <fieldset>

  		                <div class="col-md-12" style="padding-right: 15px;">

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">ชื่องาน <span class="text-danger">**</span></label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="name_job" value="{{ old('name_job')}}" placeholder="ชื่อ Project งานของช่าง">
                            </div>

                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย</label>
                          <div class="col-md-8">
                            <textarea class="form-control" name="detail_job" rows="5">{{ old('detail_job') }}</textarea>
                            </div>
                        </div>
                        <br />
  		                <div class="form-group">
                        <label class="col-md-3 control-label" for="profileFirstName">เพิ่มรูปภาพประกอบ อย่างน้อย 4 รูปขึ้นไป</label>
  		                <div class="col-md-8">
  		                <input id="file-0a" class="file " type="file" name="product_image[]" accept="image/*" multiple>
  		                <input type="hidden" name="pro_id" class="form-control" value="{{ $id }}" required>
  		                </div>
                      </div>

  		                <div class="col-md-4 col-md-offset-4">
  		                    <button type="submit" class="btn btn-info center">เพิ่มผลงาน ของช่าง</button>
  		                </div>


  		                </div>
                      </fieldset>
  		                </div>

  		              </form>

          									</div>

</section>













@if($job_all)
@foreach($job_all as $job)
                    <section class="panel">
                      <div class="panel-body">
                        <div class="col-md-12" style="padding-right: 15px;">

                          <div class="form-group">
                            <label class="col-md-3 control-label" for="profileFirstName">ชื่องาน </label>
                            <div class="col-md-8">
                              <p>
                                <b>{{$job->name_job}}</b>
                              </p>
                              </div>

                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย</label>
                            <div class="col-md-8">
                              <p>
                                <b>{{$job->detail_job}}</b>
                              </p>
                              </div>
                          </div>

    		                <div class="form-group">
                          <label class="col-md-3 control-label" for="profileFirstName">รูปภาพประกอบ</label>
    		                <div class="col-md-8">

                          @if($job->img)
                          @foreach($job->img as $job_img)
                          <div class="col-md-3">
                            <img src="{{url('assets/job_img/'.$job_img->image)}}" class="img-responsive" >
                          </div>
                          @endforeach
                          @endif

    		                </div>
                        </div>
												<hr />
												<div class="col-md-4 col-md-offset-4">
	  		                    <a href="{{url('admin/edit_job/'.$job->id)}}" style="float:left" class="btn btn-info">แก้ไขข้อมูล</a>

														<form  action="{{url('admin/del_job_tech/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
	                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
																 <input type="hidden" name="id_job" value="{{$job->id}}">
																 <input type="hidden" name="id_tech" value="{{$id}}">
	                              <button type="submit" class="btn btn-danger"><i class="fa fa-times "></i> ลบข้อมูล</button>
	                          </form>

	  		                </div>


    		                </div>
                      </div>
                    </section>
                    @endforeach
                                    @endif




	</div>
</section>


@stop



@section('scripts')

<script src="{{URL::asset('back/assets/upload_image/js/fileinput.js')}}"></script>



@if ($message = Session::get('add_success'))
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

@if ($message = Session::get('del_success_img'))
<script type="text/javascript">

  var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
      var notice = new PNotify({
            title: 'ทำรายการสำเร็จ',
            text: 'ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ',
            type: 'success',
            addclass: 'stack-topright'
          });
</script>
@endif



@stop('scripts')
