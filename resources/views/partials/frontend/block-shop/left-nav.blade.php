<div class="sidebar-product">
    {{--@foreach($categories as $category)--}}
    {{--<aside class="categorie">--}}
        {{--<h4>{{$category->name}}</h4>--}}
        {{--@if($category->childs() !== null)--}}
            {{--<ul class="categories">--}}
                {{--@foreach($category->childs as $child)--}}
                {{--<li><a href="{{route('catalog.category', $child->slug)}}">{{$child->name}}</a></li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--@endif--}}
    {{--</aside>--}}
    {{--@endforeach--}}
    <aside>
        <h4>Danh mục sản phẩm</h4>
        <div id='cssmenu'>
            {{ManagerCatalog::showLeftCategories()}}
        </div>
    </aside>
    <aside class="tagcloud">
        <h4>tags</h4>
        <ul class="tagcloud">
            <li><a href="#">Bag</a></li>
            <li><a href="#">Comb</a></li>
            <li><a href="#">Chair</a></li>
            <li><a href="#">Classic</a></li>
            <li><a href="#">Desk</a></li>
            <li><a href="#">Gel</a></li>
            <li><a href="#">Lamp</a></li>
            <li><a href="#">Glass</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Table Tiles</a></li>
            <li><a href="#">Socks</a></li>
        </ul>
    </aside>
    <aside class="featured-products">
        <h4>Featured Products</h4>
        <ul>
            <li><a href="#"><img src="images/demo/mg-1.jpg" alt="mg-" width="85" height="100"/></a>
                <p class="mega-right"><span class="product-title">Destop F  lamp</span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">
                            $
                            33.00</span></span></p>
            </li>
            <li><a href="#"><img src="images/demo/mg-2.jpg" alt="mg-" width="85" height="100"/></a>
                <p class="mega-right"><span class="product-title">Destop F  lamp</span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">
                            $
                            33.00</span></span></p>
            </li>
            <li><a href="#"><img src="images/demo/mg-3.jpg" alt="mg-" width="85" height="100"/></a>
                <p class="mega-right"><span class="product-title">Destop F  lamp</span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">
                            $
                            33.00</span></span></p>
            </li>
        </ul>
    </aside>
</div>