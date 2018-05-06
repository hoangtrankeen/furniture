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
</head>
<body class="product-page @yield('page', '')">
<div id="preloaderKDZ"></div>
<div class="sn-site">

    @include('partials/frontend/header')

    <div class="container breadcrumb-wrapper" >
        @yield('breadcrumb')
    </div>

    @yield('content')

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

</body>
</html>