@extends('admin3.layouts.template')

@section('stylesheet')



@stop('stylesheet')


@section('admin3.content')

<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
 ?>

<div class="row profile-page">
  <div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
      <div class="card-body">

        <div class="profile-header text-white" style="background: url({{url('assets/image/bg_profile.png')}}) no-repeat center center;">
          <div class="d-md-flex justify-content-around">
            <div class="profile-info d-flex align-items-center">
              <img class="rounded-circle img-lg" src="{{url('assets/tech_img/'.$objs->tech_image)}}" alt="profile image">
              <div class="wrapper pl-4">
                <p class="profile-user-name">{{$objs->tech_fname}} {{$objs->tech_lname}}</p>
                <div class="wrapper d-flex align-items-center">
                  <p class="profile-user-designation">User Experience Specialist</p>
                  <select id="example-css" name="rating" autocomplete="off">
                    <option value="1" @if($objs->tech_rating == 1)
                    selected='selected'
                    @endif>1</option>
                    <option value="2" @if($objs->tech_rating == 2)
                    selected='selected'
                    @endif>2</option>
                    <option value="3" @if($objs->tech_rating == 3)
                    selected='selected'
                    @endif>3</option>
                    <option value="4" @if($objs->tech_rating == 4)
                    selected='selected'
                    @endif>4</option>
                    <option value="5" @if($objs->tech_rating == 5)
                    selected='selected'
                    @endif>5</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="details">
              <div class="detail-col">
                <p>message</p>
                <p>130</p>
              </div>
              <div class="detail-col">
                <p>Projects</p>
                <p>130</p>
              </div>
            </div>
          </div>
        </div>







        <div class="profile-body">
          <button type="button" onclick="window.location.href='{{url('admin/tech_list/'.$objs->id_te.'/edit')}}'"
             class="btn btn-outline-warning  btn-rounded btn-fw pull-right" style="margin-left:0px;"><i class="icon-settings"></i> แก้ไข</button>
          <ul class="nav tab-switch" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="user-profile-info-tab" data-toggle="pill" href="#user-profile-info" role="tab" aria-controls="user-profile-info" aria-selected="true">ข้อมูลช่าง</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="user-profile-activity-tab" data-toggle="pill" href="#user-profile-activity" role="tab" aria-controls="user-profile-activity" aria-selected="false">รูปประกอบ</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="user-profile-job-tab" data-toggle="pill" href="#user-profile-job" role="tab" aria-controls="user-profile-job" aria-selected="false">ผลงานช่าง</a>
            </li>



          </ul>
          <div class="row">
            <div class="col-md-12">
              <div class="tab-content tab-body" id="profile-log-switch">
                <div class="tab-pane fade show active pr-3" id="user-profile-info" role="tabpanel" aria-labelledby="user-profile-info-tab">


                  <table class="table table-borderless w-100 mt-4">
                    <tr>
                      <td><strong>ชื่อ-นามสกุล :</strong> {{$objs->tech_fname}} {{$objs->tech_lname}}</td>
                      <td><strong>เพศ :</strong>
                      @if($objs->tech_sex == 0)
                      ชาย
                      @else
                      หญิง
                      @endif</td>
                    </tr>
                    <tr>
                      <td><strong>จังหวัด :</strong> {{$objs->province_name}}</td>
                      <td><strong>Email :</strong> {{$objs->tech_email}}</td>
                    </tr>
                    <tr>
                      <td><strong>ตำแหน่งช่าง :</strong> @if($objs->tech_status_show == 0)

                      <div class="badge badge-warning badge-pill">ช่างธรรมดา</div>
                      @else
                       <div class="badge badge-success badge-pill">ช่างแนะนำ</div>
                      @endif

                      </td>
                      <td><strong>Phone :</strong> {{$objs->tech_phone}}</td>
                    </tr>
                  </table>


                  <div class="row mt-3 pb-4 border-bottom">
                    <div class="col-6">

                      <p>
                        <strong>ประเภทช่าง : </strong>@foreach($category as $categorys)
                        @if($categorys->options == 1)
                        <div class="badge badge-outline-warning badge-pill" style="margin:5px;">{{$categorys->name_cat}}</div>
                        @endif
                        @endforeach
                      </p>

                      <p>
                        <strong>คำอธิบาย : </strong> {{ $objs->tech_detail }}
                      </p>

                      <p>
                        <strong>ความเชี่ยวชาญ : </strong>@foreach($skill as $option_products)
                        <div class="badge badge-outline-primary badge-pill" style="margin:5px;">{{$option_products->skill_name}}</div>
                        @endforeach
                      </p>
                    </div>
                    <div class="col-6">
                      <div class="row">

                        <div class="col-12 mt-3">
                          <div id="map_canvas" style="width:100%; border:0; height:200px;" frameborder="0"></div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <style>
                  .u-name{
                    font-size: 13px;
                    font-weight: 500;
                    color: #fff;
                  }
                  </style>

                  <div class="row">
                    <div class="col-12 mt-5">
                      <h5 class="mb-5">ข้อความถึงช่าง</h5>
                      <div class="stage-wrapper pl-4">

                        @if($text_tech)
                        @foreach($text_tech as $texts)

                        <div class="stages border-left pl-5 pb-4">
                          <div class="btn btn-icons btn-rounded stage-badge btn-inverse-success">
                            <i class="icon-event"></i>
                          </div>
                          <div class="d-flex align-items-center mb-2 justify-content-between">
                            <h5 class="mb-0">{{$texts->name}}, <span class="u-name"><label class="badge badge-warning"><i class="icon-phone"></i> {{$texts->phone}}</label>,
                              <label class="badge badge-success"><i class="icon-envelope-open"></i> {{$texts->email}}</label></span>

                            </h5>
                            <small class="text-muted"><?php echo DateThai($texts->created_at); ?></small>
                          </div>
                          <p>
                            {{$texts->comments}}
                          </p>
                          <form  action="{{url('admin/text_tech/'.$texts->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                              <input type="hidden" name="tech_id" value="{{$objs->id_te}}">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" style="margin-left: 10px;float: right; margin-top: -40px;" class="btn btn-icons btn-rounded btn-outline-secondary"><i class="icon-trash"></i></button>
                          </form>
                        </div>

                        @endforeach
                        @endif


                      </div>
                    </div>
                  </div>



                </div>
         <div class="tab-pane fade" id="user-profile-activity" role="tabpanel" aria-labelledby="user-profile-activity-tab">


           <div class="row">
             <div class="col-12 mt-3">
               <label for="exampleInputFile">เพิ่มรูปภาพประกอบ อย่างน้อย 4 รูปขึ้นไป</label>
               <div class="file-upload-wrapper">
                 <div id="fileuploader">Upload</div>
               </div>


               <form  action="{{url('admin/tech_image_del/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                 <input type="hidden" name="_method" value="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="pro_id" class="form-control" value="{{ $objs->id_te }}" required>

               <div id="lightgallery" class="row lightGallery">
               @if($img_all)
               @foreach($img_all as $img_u)
               <a  class="image-tile"><img src="{{url('assets/tech_img/'.$img_u->image)}}" alt="image small" >
                 <div class="form-check form-check-primary">
                   <label class="form-check-label">
                     <input type="checkbox" name="product_image[]" value="{{$img_u->id}}" class="form-check-input">
                     เลือกรูปภาพประกอบ
                   </label>
                 </div>
               </a>

               @endforeach
               @endif
               </div>


               <button type="submit" class="btn btn-danger pull-right" style="margin-top:15px;">ลบรูปภาพที่เลือกไว้</button>
               </form>




              </div>
            </div>

                </div>



                <div class="tab-pane fade" id="user-profile-job" role="tabpanel" aria-labelledby="user-profile-job-tab">


                  <div class="row">
                    <div class="col-8 mt-5">
                      <form  method="POST" id="commentForm" action="{{url('admin/add_jobs_tech')}}" enctype="multipart/form-data">

  		                {{ csrf_field() }}

                      <div class="form-group">
                        <label for="exampleInputUsername1">ชื่องาน</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name_job" value="{{ old('name_job')}}" placeholder="ชื่อ Project งานของช่าง" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">คำอธิบาย</label>
                        <textarea class="form-control" name="detail_job" rows="5">{{ old('detail_job') }}</textarea>
                        <input type="hidden" name="pro_id" class="form-control" value="{{ $objs->id_te }}" required>
                      </div>


                      <div class="form-group">
                        <label>เพิ่มรูปภาพประกอบ อย่างน้อย 3 รูปขึ้นไป</label>

                          <input type="file" class="form-control" name="product_image[]" accept="image/*" placeholder="Upload Image"  required multiple>

                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      </form>



                      <br />





                    </div>
                  </div>




                  <div class="row">
                    <div class="col-8 mt-5">
                      <h5 class="mb-5">ผลงานของช่าง</h5>
                      <div class="stage-wrapper pl-4">

                        @if($job_all)
                        @foreach($job_all as $job)
                        <div class="stages border-left pl-5 pb-4">
                          <div class="btn btn-icons btn-rounded stage-badge btn-inverse-success">
                            <i class="icon-event"></i>
                          </div>
                          <div class="d-flex align-items-center mb-2 justify-content-between">
                            <h5 class="mb-0">{{$job->name_job}}</h5>
                            <small class="text-muted"><?php echo DateThai($job->created_at); ?> </small>
                          </div>
                          <p>{{$job->detail_job}}</p>

                          @if($job->img)
                          @foreach($job->img as $job_img)
                          <img src="{{url('assets/job_img/'.$job_img->image)}}" class="img-lg rounded" >

                          @endforeach
                          @endif


                          <form  action="{{url('admin/่job_tech_del/'.$job->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                              <input type="hidden" name="tech_id" value="{{$objs->id_te}}">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" style="margin-left: 10px;float: right; margin-top: -40px;" class="btn btn-icons btn-rounded btn-outline-secondary"><i class="icon-trash"></i></button>
                          </form>


                        </div>
                        @endforeach
                        @endif


                      </div>
                    </div>
                  </div>




                      </div>





              </div>
            </div>




          </div>
        </div>













      </div>
    </div>

  </div>
</div>





@stop



@section('scripts')
<script src="{{url('back/assets/js/data-table.js')}}"></script>
<script src="{{url('back/assets/js/form-addons.js')}}"></script>

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


<script>
$(document).ready(function()
{
$("#fileuploader").uploadFile({
url: "{{url('admin/add_gallery')}}", // Server URL which handles File uploads
headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
method: "POST", // Upload Form method type POST or GET.
enctype: "multipart/form-data", // Upload Form enctype.
formData: null, // An object that should be send with file upload. data: { key1: 'value1', key2: 'value2' }
returnType: null,
allowedTypes: "*", // List of comma separated file extensions: Default is "*". Example: "jpg,png,gif"
fileName: "product_image", // Name of the file input field. Default is file
formData: { 'pro_id': '{{$objs->id_te}}' },
dynamicFormData: function () { // To provide form data dynamically
    return {};
},
maxFileSize: -1, // Allowed Maximum file Size in bytes.
maxFileCount: -1, // Allowed Maximum number of files to be uploaded
multiple: true, // If it is set to true, multiple file selection is allowed.
dragDrop: true, // Drag drop is enabled if it is set to true
autoSubmit: true, // If it is set to true, files are uploaded automatically. Otherwise you need to call .startUpload function. Default istrue
showCancel: true,
showAbort: true,
showDone: true,
showDelete: false,
showError: true,
showStatusAfterSuccess: true,
showStatusAfterError: true,
showFileCounter: true,
fileCounterStyle: "). ",
showProgress: false,
nestedForms: true,
showDownload:false,
onLoad:function(obj){},
onSelect: function (files) {
    return true;
},
onSubmit: function (files, xhr) {},
onSuccess: function (files, response, xhr,pd) {},
onError: function (files, status, message,pd) {},
onCancel: function(files,pd) {},
downloadCallback:false,
deleteCallback: false,
afterUploadAll: false,
uploadButtonClass: "ajax-file-upload",
dragDropStr: "<span><b>Drag &amp; Drop Files</b></span>",
abortStr: "Abort",
cancelStr: "Cancel",
deletelStr: "Delete",
doneStr: "Done",
multiDragErrorStr: "Multiple File Drag &amp; Drop is not allowed.",
extErrorStr: "is not allowed. Allowed extensions: ",
sizeErrorStr: "is not allowed. Allowed Max size: ",
uploadErrorStr: "Upload is not allowed",
maxFileCountErrorStr: " is not allowed. Maximum allowed files are:",
downloadStr:"Download",
showQueueDiv:false,
statusBarWidth:500,
dragdropWidth:500
});
});
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{env('google_map')}}&libraries=places&sensor=false"></script>
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

@if ($message = Session::get('add_success_img'))
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

@if ($message = Session::get('del_success_img'))
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

@if ($message = Session::get('delete_text'))
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


@if ($message = Session::get('delete_job'))
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
