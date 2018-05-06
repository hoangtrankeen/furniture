@extends('layouts/frontend/product')

@section('title', 'Cart')

@section('css')

@endsection

@section('page', 'cart')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/cart">Giỏ hàng</a></li>
        </ol>
    </nav>
@endsection

@section('content')

<section id="app">
    <div class="container">
        @if (Cart::count() > 0)
        <form class="cart-form">
            <table>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng giá</th>
                    <th>&#32;</th>
                </tr>
                @foreach (Cart::content() as $item)
                <tr>
                    <td data-title="Product"><a href="#" class="image-product"><img src="{{asset(getFeaturedImageProduct($item->model->image))}}" alt="tab-1" width="180" height="220"/></a></td>
                    <td data-title="Name"><a href="{{ route('catalog.product',['slug' => $item->model->slug]) }}" class="name-product">{{ $item->model->name }}</a></td>
                    <td data-title="Price"><span class="price">{{ presentPrice($item->model->price) }}</span></td>
                    <td data-title="Quantity">
                        <select class="quantity" data-id="{{ $item->rowId }}">
                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td data-title="Total"><span class="total">{{ presentPrice($item->total) }}</span></td>

                    <td data-title="Remove">
                        <button type="button" class="cart-remove" data-value="{{$item->rowId}}"><i class="fa fa-trash"></i></button>
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

@section('top-js')
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

@section('javascript')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".cart-remove").on('click',function(e){
                e.preventDefault();

                var id = $(this).attr('data-value');
                console.log(id);
                $.ajax({
                    type: "POST",
                    url: window.location.origin +'/cart/remove/'+ id,
                    dataType: 'json',
                    data: {
                        id:id,
                        _method: 'DELETE'
                    },
                    success: function( data ) {
                        console.log(data.message);
                        location.reload();
                    },

                    error: function(xhr, textStatus, error){

                    }
                });

            });
        })
    </script>
@endsection