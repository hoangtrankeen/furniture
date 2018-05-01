@extends('layouts/frontend/shop')

@section('title', 'Products')

@section('css')

@endsection

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
    @forelse ($products as $product)

    <div class="product-item-wrap has-post-thumbnail">
        <div class="product-item-inner">
            <div class="product-thumb">
                <div class="product-flash-wrap"><span class="on-sale product-flash">8.8%</span><span class="on-sale product-flash">Sale</span></div>
                <div class="product-thumb-primary"><img width="300" height="400" src="{{asset($product->collect_img[0])}}" alt="42" title="42" class="attachment-shop_catalog size-shop_catalog wp-post-image"/></div>
                <div class="product-thumb-secondary"><img width="300" height="400" src="{{asset($product->collect_img[1])}}" alt="47" class="attachment-shop_catalog size-shop_catalog"/></div><a href="{{route('catalog.product',['slug'=>$product->slug])}}" class="product-link">
                    <div class="product-hover-sign">
                        <hr/>
                        <hr/>
                    </div></a>
                <div class="product-actions">
                    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-384">
                        <div class="yith-wcwl-add-button show"><a href="#" class="add_to_wishlist"><i class="fa fa-heart-o"></i>Add to Wishlist</a></div>
                    </div>
                    <div class="woocommerce product compare-button"><a href="#" class="compare button">Compare</a></div>
                    <div class="add-to-cart-wrap"><a rel="nofollow" href="#" class="product_type_external button product_type_external"><i class="fa fa-info"></i> Buy Now</a></div><a href="#" class="product-quick-view"><i class="fa fa-search"></i>Quick view</a>
                </div>
            </div>
            <div class="product-info">
                <div class="rate"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div><span class="price">
                    <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->final_price}}</span></del><ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->final_price}}</span></ins></span><a href="#" target="_blank">
                    <h3>{{ $product->name }}</h3></a>
            </div>
        </div>
    </div>
    @empty
        <div style="text-align: left">No items found</div>
    @endforelse
    {{ $products->links('vendor.pagination.semantic-ui') }}

@endsection

@section('javascript')

@endsection