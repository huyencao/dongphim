<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon"
          href="{!! url(!empty($setting->site_favicon) ? $setting->site_favicon : '') !!}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    <!--link css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/slick-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/responsive.css') }}">
    <script type="text/javascript" src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=880442072335161&autoLogAppEvents=1"></script>
</head>
<body>

@include('frontend.layouts.header')

@yield('content')
{{--<nav id="cd-lateral-nav" class="visible-mobile">--}}
{{--    <ul class="cd-navigation nav-dropdown">--}}
{{--        <li><a href="index.html" title="">Trang chủ</a> </li>--}}
{{--        <li class="item-has-children">--}}
{{--            <a href="list.html" title="">Thể loại</a>--}}
{{--            <ul class="sub-menu">--}}
{{--                <li><a href="list.html" title="">Tình cảm- lãng mạn</a> </li>--}}
{{--                <li><a href="list.html" title="">Phim hành động</a> </li>--}}
{{--                <li><a href="list.html" title="">Phim hài hước</a> </li>--}}
{{--                <li><a href="list.html" title="">Phim cổ trang</a> </li>--}}
{{--                <li><a href="list.html" title="">Phim viễn tưởng</a> </li>--}}
{{--                <li><a href="list.html" title="">Phim võ thuật</a> </li>--}}
{{--                <li><a href="list.html" title="">Tình cảm- lãng mạn</a> </li>--}}
{{--                <li><a href="list.html" title="">Phim hành động</a> </li>--}}
{{--                <li><a href="list.html" title="">Phim hài hước</a> </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a href="list.html" title="">Quốc Gia</a> </li>--}}
{{--        <li><a href="list.html" title="">Phim Bộ</a> </li>--}}
{{--        <li><a href="list.html" title="">Phim Chiếu Rạp</a> </li>--}}
{{--        <li><a href="list.html" title="">Phim Sắp Chiếu</a> </li>--}}
{{--        <li><a href="list.html" title="">TV Show</a> </li>--}}
{{--        <li><a href="list.html" title="">Hoạt Hình - Anime</a> </li>--}}
{{--    </ul>--}}
{{--</nav>--}}

@include('frontend.layouts.footer')

<!--Link js-->
<script type="text/javascript" src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/private.js') }}"></script>
</body>
</html>
