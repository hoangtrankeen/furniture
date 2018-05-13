@extends('layouts/frontend/product')

@section('title', 'Products')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/web/modal/mymodal.css')}}">
    <style>
        .owl-carousel .owl-item img{
            width: 80%;
        }
    </style>
@endsection

@section('page', 'single-product')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            @if(Session::has('category'))
                @php $bread =  Session::get('category');@endphp
                <li class="breadcrumb-item"><a href="{{route('catalog.category', $bread['slug'])}}">{{ $bread['name']}}</a></li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
    </nav>
@endsection

@section('content')
<section class="product-information">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="sync1" class="owl-carousel owl-template">
                    @foreach($product->collect_img as $img)
                    <div class="item">
                        <figure><img src="{{asset($img)}}" alt="slide" width="540" height="700"/></figure>
                    </div>
                    @endforeach
                </div>
                <div id="sync2" class="owl-carousel owl-template">
                    @foreach($product->collect_img as $img)
                        <div class="item">
                            <figure><img src="{{asset($img)}}" alt="slide" width="180" height="220"/></figure>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="summary-product entry-summary">
                    <h1 class="product_title">{{ $product->name }}</h1>
                    <div class="woocommerce-product-rating"></div>
                    <div class="rate-price">
                        <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><a href="#" class="woocommerce-review-link">(1 review)</a>
                        <p class="price"><span>{{ presentPrice($product->final_price) }}</span></p>
                    </div>
                    <div class="product-single-short-description">
                        <p>{{ $product->details }}</p>
                    </div>
                    <form id="form-cart" action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data" class="cart">
                        <div class="quantity">
                            <div class="quantity-inner">
                                <input step="1" min="1" name="quantity" value="1" title="Qty" size="4" type="number" class="input-text qty text"/>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="final_price" value="{{ $product->final_price }}">
                        {{ csrf_field() }}
                        <button type="submit" class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
                    </form>
                    <div class="product_meta">
                        <span class="sku_wrapper">
                            <label>Mã sản phẩm:</label>
                            <span class="sku">{{$product->sku}}</span>
                        </span>
                        <span class="product-stock-status-wrapper">
                            <label>Tình trạng:</label>
                            <span class="product-stock-status in-stock">{{getProductStatus($product->in_stock)}}</span>
                        </span>
                        @foreach($product->attributeValue as $attr)
                            <span class="posted_in">
                                <label> {{$attr->attribute->name}}</label><span>{{$attr->name}}</span>
                             </span>
                        @endforeach
                    <div class="social-share-wrap">
                        <label>Follow us:</label>
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i>facebook</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i>twitter</a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i>google</a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i>linkedi</a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i>tumblr</a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i>pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="product-single-tab">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#1a" data-toggle="tab">Chi tiết sản phẩm</a></li>
                        <li><a href="#2a" data-toggle="tab">Đánh giá</a></li>
                    </ul>
                    <div class="desc-review-content tab-content clearfix">
                        <div id="1a" class="tab-pane active">
                            <p>{!! $product->description !!}</p>
                        </div>
                        <div id="2a" class="tab-pane">
                            <div id="reviews" class="woocommerce-Reviews">
                                <div id="comments">
                                    <h2 class="woocommerce-Reviews-title">1 review for <span>{{ $product->name }}</span></h2>
                                    <ol class="commentlist">
                                        <li class="comment">
                                            <div class="comment_container"><img alt="avatar" src="images/demo/avatar.png" width="60" height="60" class="avatar"/>
                                                <div class="comment-text">
                                                    <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                                                    <p class="meta"><strong>admin</strong>
                                                        <time datetime="2016-04-22T01:52:05+00:00">April 22, 2016</time>
                                                    </p>
                                                    <div class="description">
                                                        <p>Good product!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">
                                            <h3 id="reply-title" class="comment-reply-title">Add a review </h3>
                                            <form class="comment-form">
                                                <div class="comment-form-rating">
                                                    <label>Your Rating</label>
                                                    <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <label>Your Review <span class="required">*</span></label>
                                                    <textarea id="comment" name="comment" cols="45" rows="3" required=""></textarea>
                                                </p>
                                                <div class="comment-fields-wrap">
                                                    <div class="comment-fields-inner clearfix">
                                                        <p class="comment-form-author">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input id="author" name="author" value="" size="30" required="" type="text"/>
                                                        </p>
                                                        <p class="comment-form-email">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input id="email" name="email" value="" size="30" required="" type="email"/>
                                                        </p>
                                                        <p class="form-submit">
                                                            <input id="submit" name="submit" value="Submit" type="submit" class="submit"/>
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <div class="cart-info">
                        <p><span>Giỏ hàng</span> <span id="count"></span></p>
                        <p><span>Tổng giá</span> <span id="subtotal"></span></p>
                    </div>
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

            $("#form-cart").on('submit',function(e){
                e.preventDefault();
                var values = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: window.location.origin+'/add-to-cart',
                    dataType: 'json',
                    data: values,
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
