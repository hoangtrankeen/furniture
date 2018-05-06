<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('partials/frontend/head')
</head>

<body class="home-1">
<div id="preloaderKDZ"></div>
<div class="sn-site">

    @include('partials/frontend/header')
    <div id="example-wrapper">
        @include('partials/frontend/block-home/home-slider')

        @include('partials/frontend/block-home/featured-group')

        @include('partials/frontend/block-home/product-list')

        @yield('content')

        @include('partials/frontend/block-home/blog')

        @include('partials/frontend/block-home/newsletter')

        @include('partials/frontend/block-home/guarantee')

        @include('partials/frontend/footer')
    </div>


</div>
<!-- .mv-site-->
    <div class="popup-wrapper">
    </div>
    <!-- .popup-wrapper-->
    <div class="click-back-top-body">
        <button type="button" class="sn-btn sn-btn-style-17 sn-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-angle-up"></i></button>
    </div>


    @yield('modal')

    @include('partials/frontend/script')
    </body>
</html>