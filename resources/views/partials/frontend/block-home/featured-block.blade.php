<section style="margin: 0 150px 90px">
    <div class="home-4-colection-sale">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="banner-shortcode-wrap style_12 effect_1">
                    <div class="banner-content">
                        <div class="banner-overlay">
                            <div class="banner-title-wrap">
                                <h3 class="banner-title">dinning room</h3>
                            </div>
                        </div><img src="{{asset('media/category/features2.jpg')}}" alt="living room" width="600" height="400"/>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-12 woocommerce">
                <div class="sofa-left shortcode-single-product-wrap">
                    <div class="row">
                        @foreach($featured as $product)

                        <div class="col-md-4 col-sm-6">
                            <div class="product-item-wrap button-has-tooltip product-style_1 product-type-simple">
                                <div class="product-item-inner">
                                    <div class="product-thumb gray">
                                        <div class="product-flash-wrap"></div>
                                        <div class="product-thumb-primary"><img src="{{getFeaturedImageProduct($product->image)}}" alt="15" title="15" width="300" height="480" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                        {{--<div class="product-thumb-secondary"><img src="images/demo/sofa-2.jpg" alt="36" width="300" height="480" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">--}}
                                        {{--<div class="product-hover-sign">--}}
                                        {{--<hr/>--}}
                                        {{--<hr/>--}}
                                        {{--</div></a>--}}
                                    </div>
                                    <div class="product-actions">
                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-224">
                                            <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i> Add to Wishlist</a></div>
                                        </div>
                                        <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button"><i class="fa fa-cart-plus"></i> Add to cart</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                                    </div>
                                    <div class="product-info">
                                        <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>219.00</span></span><a href="#" target="_blank">
                                            <h3>Cool Chair</h3></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
