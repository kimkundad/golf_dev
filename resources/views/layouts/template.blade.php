<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <title> @yield('title')</title>
    <meta name="description" content="MASTER PHOTO NETWORK: ร้านมาสเตอร์ อัด ขยาย ภาพ อัดภาพระบบดิจิตอล กรอบลอย canvas FRAME กรอบรูป studio ร้านถ่ายรูป ร้านอัดรูป ร้านอัดภาพ การ์ดแต่งงาน Photobook กรอบวิทยาศาสตร์ ">
    <meta name="author" content="MASTER PHOTO NETWORK">

    <meta property="og:url" content="#">
    <meta property="og:title" content=" มาสเตอร์  Master Photo Network">
    <meta property="og:type" content="website">
    <meta property="og:image" content="#">
    <meta property="og:description" content="ผู้นำด้านการอัดรูปสี, Digital Offset Print (นามบัตร การ์ด โบร์ชัวร์ แผ่นพับ ใบปลิว ฯลฯ), กรอบ, อัลบั้ม, Photobook และ Photo Gift">
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
