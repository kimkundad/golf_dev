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
          แก้ไขข้อมูลเว็บไซต์
        </p>
        <form id="commentForm" method="POST" action="{{$url}}" enctype="multipart/form-data">
                    {{ method_field($method) }}
                    {{ csrf_field() }}

          <div class="form-group">
            <label for="exampleInputUsername1">ชื่อบริษัท</label>
            <input type="text" class="form-control" name="compony" value="{{$objs->compony}}" required>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">เบอร์โทร</label>
            <input type="text" class="form-control" name="phone" value="{{$objs->phone}}" required>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">fax</label>
            <input type="text" class="form-control" name="fax" value="{{$objs->fax}}" required>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">website</label>
            <input type="text" class="form-control" name="website" value="{{$objs->website}}" required>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">email</label>
            <input type="text" class="form-control" name="email" value="{{$objs->email}}" required>
          </div>


          <div class="form-group">
            <label for="exampleInputUsername1">ที่อยู่บริษัท</label>
            <textarea class="form-control" name="address" placeholder="ใส่ข้อมูลรายละเอียด..." rows="4" required>{{$objs->address}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">คำอธิบายเบื้องต้น</label>
            <textarea class="form-control" name="title_company" placeholder="ใส่ข้อมูลรายละเอียด..." rows="8" required>{{$objs->title_company}}</textarea>
          </div>



          <div class="form-group">
            <label for="exampleInputUsername1">พิกัดของบริษัท</label>

            <div class="row">

              <div class="col-12">
                <div id="map_canvas" style="width:100%; border:0; height:316px;" frameborder="0">
                  </div>
              </div>


              <div class="col-6">
                <br />
                  <input type="text" name="lat" id="lat" size="10" value="{{$objs->lat}}" class="form-control" placeholder="ไม่ต้องใส่เอง" required>
              </div>
              <div class="col-6">
                <br />
                  <input type="text" name="lng" id="lng" size="10" value="{{$objs->lng}}" class="form-control" placeholder="ไม่ต้องใส่เอง" required>
              </div>

            </div>


          </div>


          <hr />


          <div class="form-group">
            <label for="exampleInputEmail1">รูปภาพ</label>
            <img src="{{url('assets/category_img/'.$objs->facebook_img)}}" style="border: 1px solid #ece9e9;" class=" img-fluid rounded">
          </div>

          <div class="form-group">
            <label>แก้ไขรูปภาพ facebook</label>
            <input type="file" name="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <br />


          <div class="form-group">
            <label for="exampleInputEmail1">LOGO website</label>
            <img src="{{url('assets/image/logo_website/'.$objs->logo_img)}}" style="border: 1px solid #ece9e9;" class=" img-fluid rounded">
          </div>


          <div class="form-group">
            <label>แก้ไข LOGO website ()</label>
            <input type="file" name="image_logo" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <br />


          <div class="form-group">
            <label for="exampleInputUsername1">หัวข้อ facebook</label>
            <textarea class="form-control" name="fb_title" placeholder="ใส่ข้อมูลรายละเอียด..." rows="2" required>{{$objs->fb_title}}</textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputUsername1">รายละเอียด facebook</label>
            <textarea class="form-control" name="fb_detail" placeholder="ใส่ข้อมูลรายละเอียด..." rows="8" required>{{$objs->fb_detail}}</textarea>
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
<script src="{{url('back/assets/js/data-table.js')}}"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{env('google_map')}}&libraries=places"></script>
<script type="text/javascript">
      var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng({{$objs->lat}}, {{$objs->lat}}), zoom: 10,
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


            var myLatlng = new google.maps.LatLng({{$objs->lat}},{{$objs->lng}});
            var myOptions = {
                zoom: 10,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                }
             map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
             var marker = new google.maps.Marker({
                 position: myLatlng,
                 map: map
            });


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
