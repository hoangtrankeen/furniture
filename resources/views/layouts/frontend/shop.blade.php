<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Laravel Ecommerce | @yield('title', '')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon-->
    <link rel="shortcut icon" href="images/icon/favicon.png" type="image/x-icon">

    {{--<!-- Web Fonts-->--}}
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

    {{--<!-- Vendor CSS-->--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/animate/animated.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/owl.carousel.min/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/jquery.mmenu.all/jquery.mmenu.all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/direction/css/noJS.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/prettyphoto-master/css/prettyPhoto.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/slick-sider/slick.min.css')}}">

    <!-- Template CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/home.css')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">--}}

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')

    -->
</head>
<body class="product-page shop">
<div id="preloaderKDZ"></div>
<div class="sn-site">
    {{--Header--}}
    @include('partials/frontend/header')
    {{--<section>--}}
        {{--<div class="banner-sub-page">--}}
            {{--<div class="container">--}}
                {{--@yield('breadcrumb')--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <div class="section">
        <div class="products-in-category-tabs-wrapper container">
            <div class="products-content">
                <div class="woocommerce product-listing columns-4">
                    @include('partials/frontend/tab')
                    <div class="desc-review-content tab-content clearfix">
                        <div id="1a" class="tab-pane active">
                            @yield('content')
                        </div>
                    </div><a href="#" class="load-more-shop">Load more</a>
                </div>
            </div>
        </div>
    </div>
    @include('partials/frontend/footer')
</div>
<!-- .mv-site-->



<div class="popup-wrapper">
</div>
<!-- .popup-wrapper-->
<div class="click-back-top-body">
    <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
</div>

<!-- Vendor jQuery-->
<script type="text/javascript" src="{{asset('assets/libs/jquery/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/animate/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/owl.carousel.min/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/jquery.mmenu.all/jquery.mmenu.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/jquery-appear/jquery.appear.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/jquery-countto/jquery.countTo.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/direction/js/jquery.hoverdir.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/direction/js/modernizr.custom.97074.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/isotope/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/isotope/fit-columns.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/isotope/isotope-docs.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/mansory/mansory.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/prettyphoto-master/js/jquery.prettyPhoto.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/libs/slick-sider/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/min/main.min.js')}}"></script>

@yield('javascript')
</body>
</html>