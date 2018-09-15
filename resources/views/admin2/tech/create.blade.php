@extends('admin2.layouts.template')

<meta name="csrf-token" content="{{ csrf_token() }}" />

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
.note-editor.note-frame .note-editing-area .note-editable {
    padding-left: 50px;
    padding-right: 50px;
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








                        <div class="col-md-12">

          							<div class="tabs">

          								<div class="tab-content">

          									<div id="edit" class="tab-pane active">


                              <div class="wizard-progress wizard-progress-lg">
																	<div class="steps-progress">
																		<div class="progress-indicator" style="width: 0%;"></div>
																	</div>
																	<ul class="nav wizard-steps">
																		<li class="nav-item active ">
																			<a class="nav-link" ><span>1</span>ข้อมูลช่าง</a>
																		</li>
																		<li class="nav-item ">
																			<a class="nav-link "  ><span>2</span>รูปภาพประกอบ</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" ><span>3</span>ผลงานช่าง</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" ><span>4</span>สำเร็จ</a>
																		</li>
																	</ul>
																</div>


                              <form  method="POST" action="{{$url}}" enctype="multipart/form-data">
                                          {{ method_field($method) }}
                                          {{ csrf_field() }}


          											<fieldset>
                                  <div class="col-md-12">
                                  <h4 class="mb-xlg">เพิ่ม ช่างใหม่</h4>
                                  </div>
                                  <hr />
                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล <span class="text-danger">**</span></label>
          													<div class="col-md-4">
          														<input type="text" class="form-control" name="tech_fname" value="{{ old('tech_fname')}}" placeholder="ชื่อจริง">
          														</div>
                                      <div class="col-md-4">
            														<input type="text" class="form-control" name="tech_lname" value="{{ old('tech_lname')}}" placeholder="นามสกุล">
            														</div>
          												</div>


                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">เบอร์โทร <span class="text-danger">**</span><br /> Email ไม่มีก็ได้ แต่ต้องใส่ เบอร์โทรติดต่อ</label>
          													<div class="col-md-4">
          														<input type="text" class="form-control" name="tech_email" value="{{ old('tech_email')}}" placeholder="Example@gmail.com">
          														</div>
                                      <div class="col-md-4">
            														<input type="text" class="form-control" name="tech_phone" value="{{ old('tech_phone')}}" placeholder="081-100-775x">
            														</div>
          												</div>

                                  <hr />

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">ช่างแนะน <span class="text-danger">*</span></label>
          													<div class="col-md-8">
                                      <select name="tech_show" class="form-control mb-md" required>

                                        <option value="0">ช่างธรรมดา</option>
  								                      <option value="1">ช่างแนะนำ</option>
  								                    </select>
          														</div>

          												</div>

                                  <hr />



                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">จังหวัด <span class="text-danger">*</span></label>
          													<div class="col-md-8">
          														<select name="province_id" class="form-control mb-md" required>

                                        <option value="">-- เลือกจังหวัด --</option>
  								                        @foreach($province_th as $x)
  													                 <option value="{{$x->id}}">{{$x->province_name}}</option>
  													              @endforeach
  								                    </select>
          								            </select>
          													</div>
          												</div>









              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">ให้คลิกจุิ้มที่ map <br />ด้านบนเพื่อดึงว่า lat long มา <span class="text-danger">**</span><br /> จิ้มสุ่มๆ ในแผนที่ ตรงจังหวัดของที่ช่าง นั้นๆอยู่ ไม่ต้องพิกัดจริงๆก็ได้</label>
                <div class="col-sm-9">
                  <div id="map_canvas" style="width:100%; border:0; height:316px;" frameborder="0">
                  </div>
                <br>
                </div>
                <label for="name" class="col-sm-3 control-label"> </label>
                <div class="col-sm-4">
                    <input type="text" name="lat" id="lat" size="10" value="{{ old('lat') }}" class="form-control" placeholder="ไม่ต้องใส่เอง" required>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="lng" id="lng" size="10" value="{{ old('lng') }}" class="form-control" placeholder="ไม่ต้องใส่เอง" required>
                </div>
                </div>




                                  <hr />
                                  <div class="col-md-12">
                                    <p>
                                      เลือก ประเภทช่าง ได้มากกว่า 1 ทางเลือก <span class="text-danger">*</span>
                                      <br />
                                    </p>
                                  </div>



                                  @foreach($category as $categorys)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1"></label>
                                      <div class="col-md-8">
                                  <div class="checkbox-custom checkbox-primary">
                                   <input type="checkbox" name="category[]" id="checkboxExample2" value="{{$categorys->id}}">
                                   <label for="checkboxExample2">{{$categorys->name_cat}}</label>
                                 </div>
                                 </div>
                                   </div>
                                  @endforeach
                                  <br />
                                  <br />



                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileAddress">ระดับดาวของช่าง<span class="text-danger">*</span></label>
          													<div class="col-md-8">
          														<select name="tech_rating" class="form-control mb-md" required>

                                        <option value="1">1 ดาว</option>
                                        <option value="2">2 ดาว</option>
                                        <option value="3">3 ดาว</option>
                                        <option value="4">4 ดาว</option>
                                        <option value="5">5 ดาว</option>

  								                    </select>
          								            </select>
          													</div>
          												</div>

                                  <div class="form-group">
          													<label class="col-md-3 control-label" for="profileFirstName">คำอธิบาย<span class="text-danger">**</span></label>
          													<div class="col-md-8">
          														<textarea class="form-control" name="tech_detail" rows="5">{{ old('tech_detail') }}</textarea>
          														</div>
          												</div>




                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1">รูปหลักช่าง<span class="text-danger">**</span></label>
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
                                      เลือก ความเชี่ยวชาญ ได้มากกว่า 1 ทางเลือก <span class="text-danger">**</span>
                                      <br />
                                    </p>
                                  </div>



                                  @foreach($skill as $option_products)
                                  <div class="form-group">
                                    <label class="col-md-3 control-label" for="exampleInputEmail1"></label>
                                      <div class="col-md-8">
                                  <div class="checkbox-custom checkbox-primary">
                                   <input type="checkbox" name="option[]" id="checkboxExample2" value="{{$option_products->id}}">
                                   <label for="checkboxExample2">{{$option_products->skill_name}}</label>
                                 </div>
                                 </div>
                                   </div>
                                  @endforeach
                                  <br />
                                  <br />











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




<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDpN7ALbslkRAqQEdaS1Bz0J-Tu7e8rzy8&libraries=places&sensor=false'></script>
<script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(13.7211075, 100.5904873 ),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location,
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>





@stop('scripts')
