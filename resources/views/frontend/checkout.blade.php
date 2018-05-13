@extends('layouts/frontend/blank')

@section('title', 'Checkout')

@section('css')
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        /**
         * The CSS shown here will not be introduced in the Quickstart guide, but shows
         * how you can use CSS to style your Element's container.
         */
        .StripeElement {
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection

@section('page', 'checkout')

@section('breadcrumb')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/cart">Thanh toán</a></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <section>
        <div class="container">
            <!--<div class="form-customers">
                <h3 class="check-out-title">Returning customers?</h3>
                <div class="woocommerce-checkout-info">Returning customer?
                    <div class="showlogin">Click here to login</div>
                </div>
                <form class="login">
                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
                    <p>
                        <label>Username or email <span class="required">*</span></label>
                        <input id="username" name="username" type="text"/>
                    </p>
                    <p>
                        <label>Password   <span class="required">*</span></label>
                        <input id="password" name="password" type="password"/>
                    </p>
                    <div class="clear"></div>
                    <p>
                        <input name="login" value="Login" type="submit" class="button"/>
                        <label class="inline">
                            <input id="rememberme" name="rememberme" value="forever" type="checkbox"/> Remember me
                        </label>
                    </p>
                    <p class="lost_password"><a href="#">Lost your password?</a></p>
                    <div class="clear"></div>
                </form>
                <div class="woocommerce-checkout-info">Have a coupon?
                    <div class="showcoupon">Click here to enter your code</div>
                </div>
                <form class="checkout_coupon">
                    <input type="text"/>
                    <p><a href="#" class="btn">Apply Coupon</a></p>
                </form>
            </div>-->
            <form class="checkout" action="{{route('checkout')}}" method="post"  id="payment-form">
                {{csrf_field()}}
                <div id="customer_details" class="col2-set row">
                    <div class="col-1 col-md-6">
                        <div class="woocommerce-billing-fields">
                            <h3>Thông tin hóa đơn</h3>
                            <p>
                                <label>Tên <abbr title="required" class="required">*</abbr></label>
                                <input id="name" name="name" placeholder="" autocomplete="family-name" value="" type="text"/>
                            </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <label>Email <abbr title="required" class="required">*</abbr></label>
                                        @if (auth()->user())
                                            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" readonly>
                                        @else
                                            <input type="email"  name="email" id="email" value="{{ old('email') }}" required>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <label>Số điện thoại <abbr title="required" class="required">*</abbr></label>
                                        <input type="tel" name="phone" id="phone"/>
                                    </p>
                                </div>
                            </div>
                            <p>
                                <label>Địa chỉ <abbr title="required" class="required">*</abbr></label>
                                <input type="text" name="address" id="address">
                            </p>
                            <p>
                                <label>Thành phố <abbr title="required" class="required">*</abbr></label>
                                <input type="text" name="city" id="city"/>
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <label>Huyện / Quận</label>
                                        <input type="text" name="province" id="province">
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <label>Postcode / ZIP</label>
                                        <input type="text" name="postalcode" id="postalcode" />
                                    </p>
                                </div>
                            </div>
                            {{--<p class="create-account woocommerce-validated">--}}
                                {{--<input type="checkbox" id="createaccount"/>--}}
                                {{--<label class="checkbox">Create an account?</label>--}}
                            {{--</p>--}}
                            {{--<div class="create-account">--}}
                                {{--<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>--}}
                                {{--<p>--}}
                                    {{--<label>Account password <abbr title="required" class="required">*</abbr></label>--}}
                                    {{--<input type="password"/>--}}
                                {{--</p>--}}
                                {{--<div class="clear"></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="col-2 col-md-6">
                        <div class="woocommerce-shipping-fields">
                            <h3>Order của bạn</h3>
                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-total">Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (Cart::content() as $item)
                                        <tr class="cart_item">
                                            <td class="product-name">{{$item->model->name}}<strong class="product-quantity">× {{$item->qty}}</strong></td>
                                            <td class="product-total"><span class="woocommerce-Price-amount amount">{{presentPrice($item->price)}}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    {{--<tr class="cart-subtotal">--}}
                                        {{--<th>Subtotal</th>--}}
                                        {{--<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>890.00</span></td>--}}
                                    {{--</tr>--}}
                                    <tr class="order-total">
                                        <th>Tổng tiền</th>
                                        <td><strong><span class="woocommerce-Price-amount amount">{{presentPrice(Cart::total())}}</span></strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="payment_method_cheque">
                                            <div class="payment_box_title active">
                                                <input id="payment_method_cheque" name="payment_method" value="cheque" checked="checked" data-order_button_text="" type="radio" class="input-radio"/>
                                                <label>Thanh toán sau</label>
                                            </div>
                                            <div class="payment_box payment_method_cheque">
                                            </div>
                                        </li>
                                        <li class="payment_method_paypal">
                                            <div class="payment_box_title">
                                                <input id="payment_method_paypal" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal" type="radio" class="input-radio"/>
                                                <label>Thanh toán với Stripe <img src="{{asset('assets/images/logo/logo-stripe.png')}}" alt="Stripe Acceptance Mark"/><a href="#" title="Stripe là gì ?" class="about_paypal">Stripe là gì ?</a></label>
                                            </div>

                                            <div class="payment_box payment_method_paypal">
                                                <h3>Payment Details</h3>

                                                <div class="form-group">
                                                    <label for="name_on_card">Name on Card</label>
                                                    <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="card-element">
                                                        Credit or debit card
                                                    </label>
                                                    <div id="card-element">
                                                        <!-- a Stripe Element will be inserted here. -->
                                                    </div>

                                                    <!-- Used to display form errors -->
                                                    <div id="card-errors" role="alert"></div>
                                                </div>
                                                <div class="spacer"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="place-order">
                                        <noscript>Trong trường hợp trình duyệt của bạn không hỗ trợ Javascript, hoặc nó bị tắt đi, vui lòng bấm <em>nút Cập nhật tổng giá</em> trước khi đặt hàng. Điều đó đảm bảo rằng đó là giá cuối cùng bạn muốn thanh toán<br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /></noscript>
                                        <input id="place_order" type="submit" class="button alt"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </section>

@endsection

@section('javascript')
    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable the submit button to prevent repeated clicks
                document.getElementById('place_order').disabled = true;

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value
                };

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        // Enable the submit button
                        document.getElementById('place_order').disabled = false;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();
    </script>
@endsection