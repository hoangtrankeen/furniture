@extends('layouts/frontend/product')

@section('title', 'Cart')

@section('css')

@endsection

@section('page', 'cart')

@section('breadcrumb')
    <div class="breadcrumbs">
        <div class="breadcrumbs-list">
            <div class="page">Home</div>
            <div class="page">Shopping Cart</div>
        </div>
    </div>
    <h2 class="sub-page-name">Shopping Cart</h2>
@endsection

@section('content')

<section>
    <div class="container">
        @if (Cart::count() > 0)
        <form class="cart-form">
            <table>
                <tr>
                    <th>Product</th>
                    <th>&#32;</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>&#32;</th>
                </tr>
                @foreach (Cart::content() as $item)
                    <td data-title="Product"><a href="#" class="image-product"><img src="{{asset(getOneProductImg($item->model->images))}}" alt="tab-1" width="180" height="220"/></a></td>
                    <td data-title="Name"><a href="{{ route('product.'.$item->model->slug) }}" class="name-product">{{ $item->model->name }}</a></td>
                    <td data-title="Price"><span class="price">{{ ($item->model->price) }}</span></td>
                    <td data-title="Quantity">
                        <select class="quantity" data-id="{{ $item->rowId }}">
                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td data-title="Total"><span class="total">{{ ($item->subtotal) }}</span></td>

                    <td data-title="Remove">
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="cart-options"><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="button-cart">
                <div class="button-cart-left">
                    <input type="text" placeholder="Coupon code"/><a href="#" class="coupon">Apply Coupon</a>
                </div>
                <div class="button-cart-right"><a href="#" class="update-cart">Update Cart</a><a href="{{route('checkout')}}" class="process">Proceed to Checkout</a></div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-6">
                <form class="cart-total">
                    <h4>Cart Totals</h4>
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td> <span class="subtotal">{{presentPrice(Cart::subtotal()) }}</span></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td> <span class="total">{{presentPrice(Cart::total())}}</span></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id');
                    axios.patch('/cart/'+id, {
                        quantity: this.value
                    })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })
        })();
    </script>
@endsection