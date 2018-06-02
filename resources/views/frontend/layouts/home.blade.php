<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend/partials/head')
</head>

<body class="animsition">
	@include('frontend/partials/header')
	@include('frontend/partials/panel-cart')
	@include('frontend/partials/slider')
	@include('frontend/partials/banner')
	{{--@include('frontend/partials/product-grid')--}}
	@include('frontend/partials/home-block/slide-product')
	@include('frontend/partials/footer')
	@include('frontend/partials/modal')
	@include('frontend/partials/script')
</body>

</html>