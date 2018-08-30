@extends('admin2.layouts.template')



<style>
.bg-quaternary {
    background: #734BA9;
    color: #FFF;
}
.widget-summary .summary-icon{
      padding-top: 22px;
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

              <a class="sidebar-right-toggle" data-open="sidebar-right" ></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
                <div class="col-xs-12">

                  <div class="col-md-4 col-lg-4 col-xl-4">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-user-plus"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">ยอดสมัครช่างใหม่</h4>
														<div class="info">
															<strong class="amount">1281</strong>
															<span class="text-primary">(14 วันนี้)</span>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase">(ดูทั้งหมด)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>

                <div class="col-md-4 col-lg-4 col-xl-4">
                  <section class="panel panel-featured-left panel-featured-quaternary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quaternary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">ช่างในระบบทั้งหมด</h4>
														<div class="info">
															<strong class="amount">3765</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase">(ดูทั้งหมด)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
                </div>


                <div class="col-md-4 col-lg-4 col-xl-4">

                  <section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-envelope"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">ข้อความ ต้องการช่าง</h4>
														<div class="info">
															<strong class="amount">38</strong>
														</div>
													</div>
													<div class="summary-footer">
														<a class="text-muted text-uppercase">(ดูทั้งหมด)</a>
													</div>
												</div>
											</div>
										</div>
									</section>
                </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-lg-6">

                  <div class="col-md-12">
                  <section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">

									</div>

									<h2 class="panel-title">
										<span class="label label-primary label-sm text-weight-normal va-middle mr-sm">52+</span>
										<span class="va-middle">กิจกรรมล่าสุด</span>
									</h2>
								</header>
								<div class="panel-body">
									<div class="content">
										<ul class="simple-user-list">
											<li>
												<figure class="image rounded">
													<img src="{{url('assets/images/user-avatar_3.jpg')}}" alt="Joseph Doe Junior" class="img-circle" style="width:35px;">
												</figure>
												<span class="title">ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้าน</span>
												<span class="message truncate">อำเภอหนองแขม ท่าไม้เมือง!</span>
											</li>
											<li>
												<figure class="image rounded">
													<img src="{{url('assets/images/user-avatar_4.jpg')}}" alt="Joseph Doe Junior" class="img-circle" style="width:35px;">
												</figure>
												<span class="title">ช่างสง ฝ้างานดี ต้องการสมัครเป็นช่างฝ้า ในระบบ จังหวัดสงขลา</span>
												<span class="message truncate">จังหวัดสงขลา</span>
											</li>
											<li>
												<figure class="image rounded">
													<img src="{{url('assets/images/user-avatar_2.jpg')}}" alt="Joseph Doe Junior" class="img-circle" style="width:35px;">
												</figure>
												<span class="title">ช่างดำ งานเหล็ก ต้องการสมัครเป็นช่างเหล็ก ในระบบ </span>
												<span class="message truncate">งหวัดลำปาง</span>
											</li>
                      <li>
												<figure class="image rounded">
													<img src="{{url('assets/images/user-avatar_3.jpg')}}" alt="Joseph Doe Junior" class="img-circle" style="width:35px;">
												</figure>
												<span class="title">ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้าน</span>
												<span class="message truncate">อำเภอหนองแขม ท่าไม้เมือง!</span>
											</li>
											<li>
												<figure class="image rounded">
													<img src="{{url('assets/images/user-avatar_4.jpg')}}" alt="Joseph Doe Junior" class="img-circle" style="width:35px;">
												</figure>
												<span class="title">ช่างสง ฝ้างานดี ต้องการสมัครเป็นช่างฝ้า ในระบบ จังหวัดสงขลา</span>
												<span class="message truncate">จังหวัดสงขลา</span>
											</li>
											<li>
												<figure class="image rounded">
													<img src="{{url('assets/images/user-avatar_2.jpg')}}" alt="Joseph Doe Junior" class="img-circle" style="width:35px;">
												</figure>
												<span class="title">ช่างดำ งานเหล็ก ต้องการสมัครเป็นช่างเหล็ก ในระบบ </span>
												<span class="message truncate">งหวัดลำปาง</span>
											</li>
										</ul>
										<hr class="dotted short">
										<div class="text-right">
											<a class="text-uppercase text-muted" href="#">(ดูทั้งหมด)</a>
										</div>
									</div>
								</div>

							</section>
              </div>
                </div>




                <div class="col-xl-3 col-lg-6">

                  <div class="col-md-12">
                  <section class="panel">

                    <div class="panel-body">

													<h4 class="panel-title">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
															<i class="fa fa-check"></i> ข้อความ หาช่าง วันนี้
														</a>
													</h4>
                          <br />

														<ul class="widget-todo-list ui-sortable">
                              <li class="ui-sortable-handle">
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem2" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span><strong>คุณเปา</strong> ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้านหนองแขม!</span></label>
																</div>
																<div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</div>
															</li>
															<li class="ui-sortable-handle">
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem2" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span><strong>คุณเปา</strong> ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้านหนองแขม!</span></label>
																</div>
																<div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</div>
															</li>
															<li class="ui-sortable-handle">
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem3" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span><strong>คุณเปา</strong> ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้านหนองแขม!</span></label>
																</div>
																<div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</div>
															</li>
															<li class="ui-sortable-handle">
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem4" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span><strong>คุณเปา</strong> ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้านหนองแขม!</span></label>
																</div>
																<div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</div>
															</li>
															<li class="ui-sortable-handle">
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem5" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span><strong>คุณเปา</strong> ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้านหนองแขม!</span></label>
																</div>
																<div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</div>
															</li>
															<li class="ui-sortable-handle">
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem6" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span><strong>คุณเปา</strong> ต้องการจ้าง ช่างแดง ปูนดี มารับงานปูนที่ โครงการหมู่บ้านหนองแขม!</span></label>
																</div>
																<div class="todo-actions">
																	<a class="todo-remove" href="#">
																		<i class="fa fa-times"></i>
																	</a>
																</div>
															</li>
														</ul>


													</div>

                  </section>
                  </div>
                    </div>




            </div>
        </div>
</section>
@stop



@section('scripts')



@stop('scripts')
