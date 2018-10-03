@extends('layouts.template')

@section('title')
Register | ช่างตกแต่งคอนกรีต เว็บไซต์ ที่รวบรวมช่างฝีมือดีทั่วฟ้าเมืองไทย
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
          <div class="tab-content margin-top-35 margin-bottom-35" id="tab1" >
            <h4 class="headline ">Sign Up</h4>


            <form class="form-horizontal" id="my_form_register" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

            <p class="form-row form-row-wide">
              <label for="username2">Username:
                <i class="im im-icon-Male"></i>
                <input type="text" class="input-text" name="name" id="username2" value="" />
              </label>
            </p>

            <p class="form-row form-row-wide">
              <label for="email2">Email Address:
                <i class="im im-icon-Mail"></i>
                <input type="text" class="input-text" name="email" id="email2" value="" />
              </label>
            </p>

            <p class="form-row form-row-wide">
              <label for="password1">Password:
                <i class="im im-icon-Lock-2"></i>
                <input class="input-text" type="password" name="password" id="password1"/>
              </label>
            </p>

            <p class="form-row form-row-wide">
              <label for="password2">Repeat Password:
                <i class="im im-icon-Lock-2"></i>
                <input class="input-text" type="password" name="password_confirmation" id="password2"/>
              </label>
            </p>


            <a href="javascript:{}" onclick="document.getElementById('my_form_register').submit();" class="button book-now fullwidth margin-top-5">Sign Up</a>

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
