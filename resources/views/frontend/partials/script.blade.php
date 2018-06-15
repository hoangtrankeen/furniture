<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/select2/select2.min.js')}}"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('frontend/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/parallax100/parallax100.js')}}"></script>
<script>
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
<script>
    $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script>
    $('.js-addwish-b2').on('click', function(e){
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });



</script>
<!--===============================================================================================-->
<script src="{{asset('frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="{{asset('frontend/js/main.js')}}"></script>

<!--Quick-view-->
<script src="{{asset('frontend/js/quick-view.js')}}"></script>

<!--Quick-view-->
<script src="{{asset('frontend/js/addto.js')}}"></script>
{{--<script src="{{asset('frontend/js/addto-group.js')}}"></script>--}}

<!--Loading-->
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.4/dist/loadingoverlay.min.js"></script>
<!--https://gasparesganga.com/labs/jquery-loading-overlay/#get-it-->

@yield('javascript')