@extends('admin3.layouts.template')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('stylesheet')



@stop('stylesheet')


@section('admin3.content')



<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$datahead}} </h4>
        <div class="row">
          <div class="col-12 ">

            <form class="cmxform" id="commentForm" novalidate="novalidate" method="POST" action="{{$url}}" enctype="multipart/form-data">
                        {{ method_field($method) }}
                        {{ csrf_field() }}

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">ชื่อ</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control " name="tech_fname" value="{{ old('tech_fname')}}" placeholder="ชื่อจริง" required/>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">นามสกุล</label>
                              <div class="col-sm-9">
                                <input  type="text" class="form-control" name="tech_lname" value="{{ old('tech_lname')}}" placeholder="นามสกุล" required/>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">อีเมล</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="tech_email" value="{{ old('tech_email')}}" placeholder="Example@gmail.com"/>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">เบอร์โทร</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="tech_phone" value="{{ old('tech_phone')}}" placeholder="081-100-775x" required/>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">เพศ</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="tech_sex">
                                  <option value="0">ชาย</option>
                                  <option value="1">หญิง</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">ตำแหน่งช่าง</label>
                              <div class="col-sm-4">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="tech_show" id="membershipRadios1" value="0" checked>
                                    ช่างธรรมดา
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="tech_show" id="membershipRadios2" value="1">
                                    ช่างแนะนำ
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">จังหวัด</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="province_id" required>
                                  <option value="">-- เลือกจังหวัด --</option>
                                  @foreach($province_th as $x)
                                     <option value="{{$x->id}}">{{$x->province_name}}</option>
                                  @endforeach

                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">ระดับดาวของช่าง</label>
                              <div class="col-sm-9">
                                <select id="example-fontawesome" name="tech_rating" autocomplete="off">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>


                        <br />
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">ให้คลิกจุิ้มที่ map <br /><br />ด้านบนเพื่อดึงว่า lat long มา <span class="text-danger">**</span><br /> จิ้มสุ่มๆ ในแผนที่ ตรงจังหวัดของที่ช่าง นั้นๆอยู่ ไม่ต้องพิกัดจริงๆก็ได้</label>
                              <div class="col-sm-9">

                                <div id="map_canvas" style="width:100%; border:0; height:316px;" frameborder="0">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                            <div class="col-md-4">
                                <input type="text" name="lat" id="lat" size="10" value="{{ old('lat') }}" class="form-control" placeholder="ไม่ต้องใส่เอง" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="lng" id="lng" size="10" value="{{ old('lng') }}" class="form-control" placeholder="ไม่ต้องใส่เอง" required>
                            </div>
                            </div>

                          </div>

                        </div>

                        <hr />
                        <br />

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label">เลือก ประเภทช่าง ได้มากกว่า 1 ทางเลือก</label>
                              <div class="col-sm-6">
                                @foreach($category as $categorys)

                               <div class="form-check form-check-primary">
                                 <label class="form-check-label">
                                   <input type="checkbox" name="category[]" class="form-check-input" value="{{$categorys->id}}" required>
                                   {{$categorys->name_cat}}
                                 </label>
                               </div>

                                @endforeach
                                <br />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">คำอธิบาย</label>
                              <div class="col-sm-9">
                                <textarea class="form-control" id="exampleTextarea1" name="tech_detail" placeholder="ใส่ข้อมูลรายละเอียดของช่างเบื้องต้น..." rows="8" required>{{ old('tech_detail') }}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>รูปภาพ</label>
                              <input type="file" name="image" class="file-upload-default">
                              <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                                <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                              </div>
                            </div>
                          </div>

                        </div>

                        <hr />

                        <div class="row">
                          <div class="col-md-6">

                            <div class="form-group row">

                              <label class="col-sm-6 col-form-label">เลือก ความเชี่ยวชาญ ได้มากกว่า 1 ทางเลือก</label>
                              <div class="col-sm-6">
                                @foreach($skill as $option_products)

                               <div class="form-check form-check-primary">
                                 <label class="form-check-label">
                                   <input type="checkbox" name="option[]" class="form-check-input" value="{{$option_products->id}}" checked required>
                                   {{$option_products->skill_name}}
                                 </label>
                               </div>

                                @endforeach
                                <br />
                              </div>

                            </div>

                          </div>

                        </div>

                        <hr />


            <br />
            <div class="col-12 mx-auto text-center">
            <button type="submit" class="btn btn-primary mr-2">บันทึกข้อมูล</button>
            <button class="btn btn-light">ยกเลิก</button>
            </div>
            </form>
          </div>
        </div>
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

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{env('google_map')}}&libraries=places&sensor=false"></script>
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

  <script src="{{url('back/assets/js/formpickers.js')}}"></script>
  <script src="{{url('back/assets/js/form-addons.js')}}"></script>
@if ($message = Session::get('add_success'))
<script>

  $.toast({
    heading: 'ทำรายการสำเร็จ',
    text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ.',
    showHideTransition: 'slide',
    icon: 'success',
    loaderBg: '#f96868',
    position: 'top-right'
  })

</script>
@endif

@if ($message = Session::get('delete'))
<script>

  $.toast({
    heading: 'ทำรายการสำเร็จ',
    text: 'ยินดีด้วย ได้ทำการลบข้อมูล สำเร็จเรียบร้อยแล้วค่ะ.',
    showHideTransition: 'slide',
    icon: 'success',
    loaderBg: '#f96868',
    position: 'top-right'
  })

</script>
@endif

@stop('scripts')
