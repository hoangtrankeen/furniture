<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials/frontend/head')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')

    -->
        <!-- Left bar -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/left-nav/css/left-nav.css')}}">

</head>
<body class="product-page product-grid product-3-columns-width-sidebar">
{{--<div id="preloaderKDZ"></div>--}}
<div class="sn-site">
    {{--Header--}}
    @include('partials/frontend/header')

    <div class="section">
        <div class="products-in-category-tabs-wrapper container">
            <div class="breadcrumb-wrapper">
                @yield('breadcrumb')
            </div>

            <div class="row">
                <div class="col-md-3">
                   @include('partials/frontend/block-shop/left-nav')
                </div>
                <div class="col-md-9">
                   @yield('content')
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

@yield('modal')

@include('partials/frontend/script')

    <script type="text/javascript" src="{{asset('assets/web/left-nav/js/left-nav.js')}}"></script>

</body>
</html>