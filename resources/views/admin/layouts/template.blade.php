<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <title> Admin Controller</title>


    @include('admin.layouts.inc-style')
    @yield('stylesheet')

</head>
<body>
    @include('admin.layouts.inc-header')
    <!-- Wrapper -->
    <div id="dashboard">
    @include('admin.layouts.inc-left-slide')

    @yield('content')




    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>


    </div>
    <!-- Wrapper / End -->

    <!-- JavaScripts -->
    @include('admin.layouts.inc-script')
    @yield('scripts')


        </body>
</html>
