@extends('admin3.layouts.template')

@section('stylesheet')



@stop('stylesheet')


@section('admin3.content')



<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
      <div class="card-body">
        <div class="row">

          <h4 class="card-title col-sm-6">{{$datahead}} ({{$count_tech}}) <button type="button" onclick="window.location.href='{{url('admin/tech_list/create')}}'"
             class="btn btn-outline-success btn-rounded btn-fw" style="margin-left:15px;"><i class="icon-plus"></i> New</button></h4>

             <div class="form-group col-sm-6">
               <form class="form-horizontal" action="{{url('admin/tech_search')}}" method="GET" enctype="multipart/form-data">
                 {{ csrf_field() }}
               <div class="input-group">
                 <input type="text" class="form-control" name="search" value="{{$search}}" placeholder="ค้นหา.." aria-label="Recipient's username">
                 <div class="input-group-append">
                   <button class="btn btn-sm btn-primary" type="submit">Search</button>
                 </div>
               </div>
               </form>
             </div>


        </div>


        <div class="row">
          <div class="col-12 table-responsive">
              <table class="table">
              <thead>
                <tr>
                  <th>ช่าง</th>
                  <th>จังหวัด</th>
                  <th>เบอร์ติดต่อ</th>
                  <th>วันที่สมัคร</th>
                  <th>แนะนำ</th>
                  <th>สถานะ</th>
                  <th>จัดการ</th>
                </tr>
              </thead>
              <tbody>


                @if($objs)
                   @foreach($objs as $u)
                       <tr id="{{$u->id_te}}">

                         <td>{{$u->tech_fname}} {{$u->tech_lname}}</td>
                         <td>{{$u->province_name}}</td>
                         <td>{{$u->tech_phone}}</td>
                         <td>{{$u->created_at}}</td>

                         <td>
                           @if($u->tech_status_show == 0)
                            <label class="badge badge-success">ช่างทั่วไป</label>
                           @else
                           <label class="badge badge-warning">ช่างแนะนำ</label>
                           @endif
                         </td>
                         <td>


                           <div class="form-check">
                             <label class="form-check-label">
                               <input type="checkbox" class="form-check-input" @if($u->tech_status == 1)
                               checked
                               @endif>

                             </label>
                           </div>

                          </td>

                         <td>

                           <div class="dropdown">
                             <button class="btn btn-outline-primary dropdown-toggle" style="padding:8px; font-size:12px;" type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               จัดการ
                             </button>
                             <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">

                               <a class="dropdown-item" href="{{url('admin/tech_list/'.$u->id_te)}}"> ดูข้อมูล</a>
                               <a class="dropdown-item" href="{{url('admin/tech_list/'.$u->id_te.'/edit')}}"> แก้ไข</a>

                               <div class="dropdown-divider"></div>
                               <form  action="{{url('admin/tech_list/'.$u->id_te)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                   <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                   <button type="submit" title="ลบบทความ" class="dropdown-item text-1 text-danger"><i class="fa fa-times "></i> ลบ</button>
                               </form>
                             </div>
                           </div>







                         </td>
                       </tr>
                    @endforeach
                 @endif



              </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<br /><br /><br /><br />


@stop



@section('scripts')
<script src="{{url('back/assets/js/data-table.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/api_tech_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id },
            success: function(data){
              if(data.data.success){


                $.toast({
                  heading: 'ทำรายการสำเร็จ',
                  text: 'ยินดีด้วย ได้ทำการเพิ่มข้อมูล สำเร็จเรียบร้อยแล้วค่ะ.',
                  showHideTransition: 'slide',
                  icon: 'success',
                  loaderBg: '#f96868',
                  position: 'top-right'
                })



              }
            }
        });
    });
});
</script>

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
