<section>
    <div class="dales-this-week">
        <div class="sperator text-center">
            <p>Bán chạy nhất</p>
            <div class="sperator-bottom"><img src="{{asset('assets/images/demo/sperator.png')}}" alt="spertor"/></div>
        </div>
        <div class="home-1-deals-this-week yolo-wrap">
            <div class="vc_row wpb_row vc_row-fluid">
                <div class="container">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner vc_custom_1461828027488">
                            <div class="wpb_wrapper">
                                <div id="shortcode-product-wrap-579a08bd562b2" class="shortcode-product-wrap">
                                    <div class="product-wrap">
                                        <div class="product-inner clearfix product-style-grid product-paging-none product-col-4">
                                            <div class="woocommerce product-listing clearfix columns-4">
                                                @foreach($lists as $product)
                                                <div class="product-item-wrap button-has-tooltip product-style_1">
                                                    <div class="product-item-inner">
                                                        <div class="product-thumb white">
                                                            <div class="product-flash-wrap"></div>
                                                            <div class="product-thumb-primary"><img width="300" height="400" src="{{getFeaturedImageProduct($product->image)}}" alt="52" title="52" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                                                            <div class="product-thumb-secondary"><img width="300" height="400" src="images/demo/deals-2.jpg" alt="50" class="attachment-shop_catalog size-shop_catalog"/></div><a href="#" class="product-link">
                                                                <div class="product-hover-sign">
                                                                    <hr/>
                                                                    <hr/>
                                                                </div></a>
                                                            <div class="product-actions">
                                                                <div class="yith-wcwl-add-to-wishlist add-to-wishlist-273">
                                                                    <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i> Add to Wishlist</a></div>
                                                                </div><a href="#" class="compare add_to_compare"><i class="fa fa-signal"></i>Compare</a>
                                                                <div class="add-to-cart-wrap"><a href="#" class="add_to_cart_button product_type_simple button product_type_simple add_to_cart_button ajax_add_to_cart"><i class="fa fa-cart-plus"></i> Add to cart</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-info">
                                                            <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>89.00</span></span><a href="#">
                                                                <h3>Vanessa Table Lamp</h3></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
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
        <!-- .home-1-deals-this-week-->
    </div>
    <!-- .home-1-deals-this-week-->
</section>
