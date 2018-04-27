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

    <!-- Web Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Ubuntu:300,300i,400,400i,500,500i,700,700i&amp;amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

    <!-- Vendor CSS-->
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

@yield('css')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')

    -->
</head>
<body class="product-page @yield('page', '')">
<div id="preloaderKDZ"></div>
<div class="sn-site">

    @include('partials/frontend/header')

    @yield('content')

    <div class="section">
        <footer class="footer footer-style-3">
            {{--<div class="slide-logo">--}}
                {{--<div class="container">--}}
                    {{--<div data-number="5" data-margin="10" data-loop="yes" data-navcontrol="yes" class="sofani-owl-carousel">--}}
                        {{--<div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-1.png" alt="logo1"/></a></div>--}}
                        {{--<div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-2.png" alt="logo1"/></a></div>--}}
                        {{--<div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-3.png" alt="logo1"/></a></div>--}}
                        {{--<div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-4.png" alt="logo1"/></a></div>--}}
                        {{--<div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-5.png" alt="logo1"/></a></div>--}}
                        {{--<div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-3.png" alt="logo1"/></a></div>--}}
                        {{--<div class="slide-logo-item"><a href="#"><img src="images/demo/slide-logo-5.png" alt="logo1"/></a></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="header-logo"><a href="index.html" title="YOLO"><img src="images/logo/logo.png" alt="logo" class="logo-img"/></a></div>
                            <div class="footer-top-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper</p><a href="#">DETAILS</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3>INFORMATION</h3>
                            <ul class="footer-top-content">
                                <li><a href="#">About US</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Store</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>CONTACT US</h3>
                            <div class="icon-box icon-box-style2">
                                <div class="icon-box-left"><i class="fa fa-map-marker"></i></div>
                                <div class="icon-box-right"><span>123 Sky Tower address name, Los Algeles</span></div>
                            </div>
                            <div class="icon-box icon-box-style2">
                                <div class="icon-box-left"><i class="fa fa-phone"></i></div>
                                <div class="icon-box-right"><span>Phone : (012) 345 6789</span></div>
                            </div>
                            <div class="icon-box icon-box-style2">
                                <div class="icon-box-left"><i class="fa fa-envelope-o"></i></div>
                                <div class="icon-box-right"><span>Email : email@yoursite.com</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="click-back-top-footer">
                        <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
                    </div>
                    <div class="footer-bottom-content">
                        <div class="copyright">©  2016  Sofani  Designed  with by  <a href="#">YoloTemplate</a></div>
                        <figure><img src="images/demo/payment-home-3.png" alt="pay-footer3"/></figure>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>
<!-- .mv-site-->



<div class="popup-wrapper">
</div>
<!-- .popup-wrapper-->
<div class="click-back-top-body">
    <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
</div>
@yield('more-js')
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