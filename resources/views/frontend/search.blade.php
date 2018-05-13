@extends('layouts/frontend/shop')

@section('title','Tìm kiếm')

@section('css')

    <!-- Modal-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/modal/mymodal.css')}}">

@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{route('catalog.search')}}">Tìm kiếm</a></li>
        </ol>
    </nav>
@endsection

@section('content')

    <div class="products-content product-tab">
        <div class="woocommerce product-listing columns-3 clearfix">
            <div class="desc-review-content tab-content clearfix">
                <div id="1a" class="tab-pane active">

                    @forelse ($products as $product)

                        <div class="product-item-wrap has-post-thumbnail">
                            <div class="product-item-inner">
                                <div class="product-thumb">
                                    <div class="product-flash-wrap"></div>
                                    <div class="product-thumb-primary"><img width="300" height="400" src="{{asset(getFeaturedImageProduct($product->image))}}" alt="15" title="15" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                    {{--<div class="product-thumb-secondary">--}}
                                    {{--<img width="300" height="400" src="{{asset($product->collect_img[1])}}" alt="36" class="attachment-shop_catalog size-shop_catalog"/>--}}
                                    {{--</div>--}}
                                    <a href="{{route('catalog.product', $product->slug)}}" class="product-link">
                                        <div class="product-hover-sign">
                                            <hr/>
                                            <hr/>
                                        </div>
                                    </a>
                                    <div class="product-actions">
                                        {{--<div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">--}}
                                        {{--<div class="yith-wcwl-wishlistexistsbrowse show"><span class="feedback">The product is already in the wishlist!</span><a href="#" rel="nofollow">Browse Wishlist</a></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>--}}
                                        {{--<a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>--}}
                                        <div class="add-to-cart-wrapper">
                                            <form action="#" class="form-cart">
                                                <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="product_name" id="product_name" value="{{$product->name}}">
                                                <input type="hidden" name="product_final_price" id="product_final_price" value="{{$product->final_price}}">
                                                <button class="add-to-cart" >Thêm vào giỏ hàng</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="rate">
                                        <i class="fa fa-star">

                                        </i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <a href="#"><h3>{{ $product->name }}</h3></a>
                                    <span class="price">
                                        <span class="woocommerce-Price-amount amount">{{presentPrice($product->final_price)}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div style="text-align: left">Hiện tại không có sản phẩm nào tại danh mục này</div>
                    @endforelse
                </div>
            </div>
        </div>
        {{ $products->links('vendor.pagination.frontend-pager') }}
    </div>

    {{--<button id="myBtn">Open Modal</button>--}}

@endsection

@section('modal')
    <!-- The Modal -->
    <div id="myModal" class="modal-custom">

        <!-- Modal content -->
        <div class="modal-content modal-small ">
            <div class="modal-header">
                <span class="close">&times;</span>
                <p id="header-message"></p>
            </div>
            <div class="modal-body clearfix">
                <div class="modal-content-left">
                    <img src="" alt="" class="to-cart-thumb">
                </div>
                <div class="modal-content-right">
                    <p><span>Giỏ hàng</span> <span id="count"></span></p>
                    <p><span>Tổng giá</span> <span id="subtotal"></span></p>
                    <div class="product-action">
                        <a href="{{url('cart')}}" class="btn-cart btn-border">Xem giỏ hàng</a>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="product-action">
                    <a href="{{route('checkout')}}" class="btn-checkout btn-full-width">Thanh toán</a>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('javascript')
    <!-- Modal-->
    <script type="text/javascript" src="{{asset('assets/web/modal/mymodal.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".form-cart").on('submit',function(e){
                e.preventDefault();
                var form_data = $(this);

                var id = form_data.find('#product_id').val();
                var name = form_data.find('#product_name').val();
                var final_price = form_data.find('#product_final_price').val();

                console.log(final_price);
                $.ajax({
                    type: "POST",
                    url: window.location.origin+'/add-to-cart',
                    dataType: 'json',
                    data: {id:id, name: name, final_price:final_price},
                    success: function( data ) {
                        console.log(data.message);
                        console.log(data.count);
                        $('#total-in-cart').html(data.count);
                        openModal();
                        importModalData(data.message,
                            data.image,
                            data.subtotal,
                            data.count
                        );


                    },

                    error: function(xhr, textStatus, error){
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    }
                });

            });
        })
    </script>
@endsection
