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

@include('partials/frontend/script')


@yield('javascript')
</body>
</html>