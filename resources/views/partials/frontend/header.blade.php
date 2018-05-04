<header class="header sn-header-style-1">
    <div class="header-top">
        <div class="container">
            <div class="header-top-left">
                <aside id="text-2" class="widget widget_text">
                    <div class="textwidget"><i class="fa fa-envelope-o"></i>companymail@gmail.com</div>
                </aside>
                <aside id="text-3" class="widget widget_text">
                    <div class="textwidget"><i class="fa fa-mobile"></i>(+84)0123 456 789</div>
                </aside>
                <aside id="text-4" class="widget widget_text">
                    <div class="textwidget"><i class="fa fa-clock-o"></i> Mon - Fri: 9.00 - 17.00 </div>
                </aside>
            </div>
            {{--<div class="header-top-right">--}}
                {{--<div class="header-top-div header-top-search">--}}
                    {{--<input type="text" placeholder="Tìm kiếm sản phẩm"/><a class="btn"><i class="fa fa-search"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div><a href="#primary-menu"><i class="fa fa-bars"></i></a>
    <div class="container-fluid">
        <div class="header-bottom">

            <div class="main-nav-wrapper header-left">
                <div class="header-logo pull-left"><a href="index.html" title="YOLO"><img src="{{asset('assets/images/logo/logo.png')}}" alt="logo" class="logo-img"/></a></div>
                <!-- .header-logo-->

                <nav id="primary-menu" class="main-nav">
                    <ul class="nav">
                        <li class="active menu-item menu-home"><a href="/">Home</a></li>
                        <li class="menu-item menu-shop"><a href="/san-pham">Sản Phẩm</a>
                            {{--<ul class="sub-menu">--}}
                            <?php /* ?> @foreach ($categories as $category)
                                <li class="menu_style_dropdown menu-item"><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item menu-item-object-page"><a href="product-2-columns-with-sidebar.html">Products 2 Columns with Sidebar</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="products-list.html">Product List</a></li>
                                    </ul>
                                </li>-->
                                @endforeach <?php */ ?>
                            <?php ManagerCatalog::showCategories(); ?>

                            {{--</ul>--}}
                        </li>
                        <li class="menu-item menu-blog"><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>
                                <li><a href="blog-3-columns.html">Blog Masonry</a></li>
                                <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                                <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns with Sidebar</a></li>
                                <li><a href="blog-list-with-sidebar.html">Blog List with Sidebar</a></li>
                                <li><a href="blog-detail.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-shop"><a href="portfolio-fullwidth-slider.html">Portfolio</a>
                            <ul class="sub-menu">
                                <li class="menu_style_dropdown menu-item"><a href="portfolio-masonry-layout.html">Masonry Layout</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-masonry-layout.html">Masonry no padding</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-masonry-with-padding.html">Masonry with padding</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-masonry-5-columns.html">Masonry 5 Columns</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-masonry-title-padding.html">Masonry Title Box Padding</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-masonry-bottom-title.html">Masonry Title Box</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-masonry-top-title.html">Top Title</a></li>
                                    </ul>
                                </li>
                                <li class="menu_style_dropdown menu-item"><a href="portfolio-packery-layout.html">Packery Layout</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-packery-layout.html">Packery no padding</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-packery-with-padding.html">Packery with padding</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-icon-title-tag.html">Packery Icon Title</a></li>
                                        <li class="menu-item menu-item-object-page"><a href="portfolio-packery-6-columns.html">Packery 6 Columns</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-blog"><a href="#">Page</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="page-404.html">404 Page</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="header-customize-item canvas-menu-toggle-wrapper">
                        <div class="canvas-menu-toggle"><i class="fa fa-bars"></i></div>
                    </div>
                    <ul class="header-customize-item header-social-profile-wrapper">
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-skype"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </nav>
                <!-- .header-main-nav-->
            </div>

            <div class="main-nav-wrapper header-right">
                <div class="header-right-box">
                    <div class="header-customize header-customize-right">
                        {{--Search bar--}}
                        <div class="search-container header-customize-item">
                            @include('partials/frontend/search-bar')
                        </div>
                        <div class="shopping-cart-wrapper header-customize-item no-price style-default">
                            <div class="widget_shopping_cart_content">
                                <div class="widget_shopping_cart_icon"><i class="wicon fa fa-cart-plus"></i><span class="total">0</span></div>
                                <div class="sub-total-text"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>0.00</span></div>
                                <div class="cart_list_wrapper">
                                    <div class="scroll-wrapper cart_list product_list_widget scrollbar-inner">
                                        <ul class="cart_list product_list_widget scrollbar-inner scroll-content">
                                            <li class="empty">
                                                <h4>An empty cart</h4>
                                                <p>You have no item in your shopping cart</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end product list-->
                                </div>
                            </div>
                        </div>
                        {{--<div class="my-wishlist header-customize-item">--}}
                            {{--<div class="widget_shopping_wishlist_content">--}}
                                {{--<div class="my-wishlist-wrapper"><a title="Wishlist" href="#" class="yolo-wishlist"><i class="wicon fa fa-heart-o"></i><span class="total">0</span></a></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <nav data-ps-id="3859a354-888f-fe67-254f-cd059357f1c2" class="yolo-canvas-menu-wrapper dark ps-container"><a href="#" class="yolo-canvas-menu-close"><i class="fa fa-close"></i></a>
        <div class="yolo-canvas-menu-inner sidebar">
            <aside id="text-5" class="widget widget_text">
                <div class="textwidget">
                    <div class="about-us-widget text-center">
                        <div class="about-image"><img src="images/demo/about-us.png" alt=""/></div>
                        <div class="about-description">Hi, I am John Doe - web designer & blogger. I love design and travel a lot. Explore new places and meet friends. Enjoy my template!</div>
                    </div>
                </div>
            </aside>
            <aside id="yolo-social-profile-2" class="text-center widget widget-social-profile">
                <ul class="social-profile social-icon-bordered">
                    <li><a title="Twitter" href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a title="Facebook" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a title="GooglePlus" href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a title="Instagram" href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </aside>
            <aside id="null-instagram-feed-5" class="instagram-col-3 padding-2 widget widget null-instagram-feed">
                <h4 class="widget-title"><span>Instagram</span></h4>
                <ul class="intagram">
                    <li><a href="#"><img src="images/demo/instagram-1.jpg" alt="tag-mega"/></a></li>
                    <li><a href="#"><img src="images/demo/instagram-2.jpg" alt="tag-mega"/></a></li>
                    <li><a href="#"><img src="images/demo/instagram-3.jpg" alt="tag-mega"/></a></li>
                    <li><a href="#"><img src="images/demo/instagram-4.jpg" alt="tag-mega"/></a></li>
                    <li><a href="#"><img src="images/demo/instagram-5.jpg" alt="tag-mega"/></a></li>
                    <li><a href="#"><img src="images/demo/instagram-6.jpg" alt="tag-mega"/></a></li>
                </ul>
                <p class="clear"><a href="#" rel="me" target="_blank">Follow Me!</a></p>
            </aside>
        </div>
    </nav>
</header>
