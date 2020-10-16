<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <title> @yield('title')</title>
    <meta name="description" content="{{title_company()}}">
    <meta name="author" content="Idea vivat">

    @yield('og_tag')


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
