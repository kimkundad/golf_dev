<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <title> @yield('title')</title>
    <meta name="description" content="{{title_company()}}">
    <meta name="author" content="Idea vivat">

    <meta property="og:url" content="#">
    <meta property="og:title" content="{{fb_title()}}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{url('assets/category_img/'.facebook_img())}}">
    <meta property="og:description" content="{{fb_detail()}}">
    <meta property="fb:admins" content="100002037238809">
    <meta property="fb:app_id" content="1063323960509612">






    @include('layouts.inc-style')
    @yield('stylesheet')

</head>
<body>
    <!-- Wrapper -->
    <div id="wrapper">
    @include('layouts.inc-header')

    @yield('content')


    @include('layouts.inc-footer')

    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>


    </div>
    <!-- Wrapper / End -->

    <!-- JavaScripts -->
    @include('layouts.inc-script')
    @yield('scripts')


        </body>
</html>
