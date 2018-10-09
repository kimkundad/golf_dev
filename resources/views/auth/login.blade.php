@extends('layouts.template')

@section('title')
Login | ช่างตกแต่งคอนกรีต เว็บไซต์ ที่รวบรวมช่างฝีมือดีทั่วฟ้าเมืองไทย
@stop

@section('stylesheet')
@stop('stylesheet')
@section('content')



<!-- Container / Start -->
<div class="container">

  <!-- Row / Start -->
  <div class="row">

    <div class="col-md-6 col-md-offset-3  ">

      <style>
      a.button.fb{
        background-color: #004dda;
      }
      .fb:hover{
        background-color: #004dda;
      }
      a.button.google{
        background-color: #f30c0c;
      }
      .google:hover{
        background-color: #f30c0c;
      }
      </style>

      <div class="sign-in-form style-1">


      <!-- Login -->
      <div class="tab-content margin-top-35 margin-bottom-50" id="tab1" >
        <h4 class="headline ">เข้าสู่ระบบ</h4>


        <form class="form-horizontal" id="my_form_login" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}

          <p class="form-row form-row-wide">
            <label for="username">Email:
              <i class="im im-icon-Male"></i>
              <input type="text" class="input-text" name="email" id="email" value="" />
            </label>
          </p>

          <p class="form-row form-row-wide">
            <label for="password">Password:
              <i class="im im-icon-Lock-2"></i>
              <input class="input-text" type="password" name="password" id="password"/>
            </label>
            <span class="lost_password">
              <a href="{{url('password/reset')}}" >รีเซ็ต Password ผู้ใช้?</a>
            </span>
          </p>

          <div class="form-row">

            <div class="checkboxes margin-top-10">
              <input id="remember-me" type="checkbox" name="check">
              <label for="remember-me">จดจำฉันไว้ในระบบ</label>
            </div>
            <br />

            <a href="javascript:{}" onclick="document.getElementById('my_form_login').submit();" class="button book-now fullwidth margin-top-5">Sign In</a>
          </div>
          
        </form>
      </div>

      </div>



    </div>
  </div>
  <!-- Row / End -->

</div>
<!-- Container / End -->


@endsection

@section('scripts')




@stop('scripts')
