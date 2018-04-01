@extends('layouts/product')

@section('title', 'Products')

@section('css')

@endsection

@section('page', 'single-product')

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="breadcrumbs-list">
            <div class="page">Home</div>
            <div class="page">Shop</div>
        </div>
    </div>
    <h2 class="sub-page-name">Shop</h2>
@endsection

@section('content')
<section class="product-information">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="sync1" class="owl-carousel owl-template">
                    <div class="item">
                        <figure><img src="images/demo/slide-1.jpg" alt="slide" width="540" height="700"/></figure>
                    </div>
                    <div class="item">
                        <figure><img src="images/demo/slide-2.jpg" alt="slide" width="540" height="700"/></figure>
                    </div>
                    <div class="item">
                        <figure><img src="images/demo/slide-3.jpg" alt="slide" width="540" height="700"/></figure>
                    </div>
                    <div class="item">
                        <figure><img src="images/demo/slide-4.jpg" alt="slide" width="540" height="700"/></figure>
                    </div>
                </div>
                <div id="sync2" class="owl-carousel owl-template">
                    <div class="item">
                        <figure><img src="images/demo/slide-small-1.jpg" alt="slide" width="180" height="220"/></figure>
                    </div>
                    <div class="item">
                        <figure><img src="images/demo/slide-small-2.jpg" alt="slide" width="180" height="220"/></figure>
                    </div>
                    <div class="item">
                        <figure><img src="images/demo/slide-small-3.jpg" alt="slide" width="180" height="220"/></figure>
                    </div>
                    <div class="item">
                        <figure><img src="images/demo/slide-small-4.jpg" alt="slide" width="180" height="220"/></figure>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="summary-product entry-summary">
                    <h1 class="product_title">{{ $product->name }}</h1>
                    <div class="woocommerce-product-rating"></div>
                    <div class="rate-price">
                        <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><a href="#" class="woocommerce-review-link">(1 review)</a>
                        <p class="price"><span>{{ $product->presentPrice() }}</span></p>
                    </div>
                    <div class="product-single-short-description">
                        <p>{{ $product->details }}</p>
                    </div>
                    <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data" class="cart">
                        <div class="quantity">
                            <div class="quantity-inner">
                                <input step="1" min="1" name="quantity" value="1" title="Qty" size="4" type="number" class="input-text qty text"/>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>
                        {{ csrf_field() }}
                    </form>
                    <div class="product_meta"><span class="sku_wrapper">
                    <label>SKU:</label><span class="sku">SE-26</span>.</span><span class="product-stock-status-wrapper">
                    <label>Availability:</label><span class="product-stock-status in-stock">In stock</span></span><span class="posted_in">
                    <label>Category:</label><a href="#">Essential</a>.</span></div>
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
                        <li class="active"><a href="#1a" data-toggle="tab">Description</a></li>
                        <li><a href="#2a" data-toggle="tab">Reviews (1)</a></li>
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
