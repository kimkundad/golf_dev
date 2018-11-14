@extends('admin3.layouts.template')

@section('stylesheet')



@stop('stylesheet')


@section('admin3.content')



<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{$datahead}} <button type="button" onclick="window.location.href='{{url('admin/user/create')}}'"
           class="btn btn-outline-success btn-rounded btn-fw" style="margin-left:15px;"><i class="icon-plus"></i> New</button></h4>
        <div class="row">
          <div class="col-12 table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>

                    <th>#ID</th>
                    <th>ชื่อผู้ใช้งาน</th>
                    <th>อีเมล</th>
                    <th>วันที่สมัคร</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>

                </tr>
              </thead>
              <tbody>
                @if($objs)
                   @foreach($objs as $u)
                       <tr id="{{$u->id}}">
                         <td>{{$u->id}}</td>
                         <td>
                           @if($u->provider == 'email')
                           <img src="{{url('assets/images/avatar/'.$u->avatar)}}" alt="{{$u->name}}" style="height:32px; width:32px;" class="img-circle">
                           @else
                           <img src="{{$u->avatar}}" alt="{{$u->name}}" style="height:32px;" class="img-circle">
                           @endif

                           {{$u->name}}</td>
                         <td>{{$u->email}}</td>

                         <td id="{{ $day = date('n', strtotime($u->created_at))}}">{{$u->created_at}}</td>
                         <td>
                           <div class="form-check">
                             <label class="form-check-label">
                               <input type="checkbox" class="form-check-input" @if($u->is_admin == 1)
                               checked
                               @endif>

                             </label>
                           </div>

                           </td>
                         <td>




                           <button type="button" style="float: left;padding: 10px;" onclick="window.location.href='{{url('admin/user/'.$u->id.'/edit')}}'"
                             class="btn btn-icons btn-rounded btn-outline-warning"><i class="icon-settings"></i></button>
                           <form  action="{{url('admin/user/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                               <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               <button type="submit" style="margin-left: 10px;float: left; padding: 10px;" class="btn btn-icons btn-rounded btn-outline-secondary"><i class="icon-trash"></i></button>
                           </form>

                         </td>
                       </tr >
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





@stop



@section('scripts')
<script src="{{url('back/assets/js/data-table.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("input:checkbox").change(function() {
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/api_user_status')}}',
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


@if ($message = Session::get('error'))
<script>

  $.toast({
    heading: 'ทำรายการไม่สำเร็จ',
    text: 'ไม่สามารถลบ User ที่เป็น admin ได้ กรุณาทำการปลดก่อน.',
    showHideTransition: 'slide',
    icon: 'error',
    loaderBg: '#f96868',
    position: 'top-right'
  })

</script>
@endif




@stop('scripts')
