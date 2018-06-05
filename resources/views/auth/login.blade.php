{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-8 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Login--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('frontend/layouts/shop')

@section('title', 'Đăng nhập')

@section('css')
    <style>
        input[type=text], input[type=password], input[type=url], input[type=tel], input[type=search], input[type=number], input[type=datetime], input[type=email] {
            background: #fff;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            -o-border-radius: 0;
            font-size: 13px;
            height: 40px;
            line-height: 36px;
            padding: 0 10px;
            vertical-align: baseline;
            width: 100%;
            color: #878787;
            box-shadow: none !important;
        }

        .login-container .block .block-title h2, .form-create-account h2 {
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 700;
            margin: 0 0 20px;
            color: #222;
        }
        .fieldset>.field:not(.choice){
            margin-bottom: 15px;
        }
        .field.note, .form-group.note {
            margin-top: 5px;
            font-style: italic;
            display: block !important;
            font-weight: 300;
        }
        a#forget-password{
            line-height: 40px;
            color: #999;
            text-transform: capitalize;
            font-weight: normal;
        }
        .title-group{
            color: #222;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92 banner-category">
        <h2 class="ltext-105 cl0 txt-center">
            Đăng nhập
        </h2>
    </section>
    <div class="bg0 m-t-40 p-b-140 flex-change">
        <div class="container">
            <div class="row">
                <div class="column main col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="login-container row">
                        <div class="col-sm-6 col-xs-12 margin-bottom50">
                            <div class="block block-customer-login">
                                <div class="block-title fieldset">
                                    <h2 class="title" id="block-customer-login-heading" role="heading" aria-level="2"><span>Khách hàng đã đăng kí</span></h2>
                                </div>
                                <div class="block-content">
                                    <form action="">
                                        <div class="field note p-b-20 p-t-10">Xin quý khách vui lòng đăng nhập với địa chỉ email</div>
                                        <div class="form-group">
                                            <label for="" class="title-group">Email*</label>
                                            <input type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="title-group">Mật khẩu*</label>
                                            <input type="text">
                                        </div>

                                        <div class="actions-toolbar p-t-10 clearfix">
                                            <button type="submit" class="pull-left flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" name="send" id="send2">Đăng nhập</button>
                                            <a id="forget-password" class="p-lr-20 margin-left15 action remind" href=""><span>Quên mật khẩu?</span></a>
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

@endsection

@section('javascript')

@endsection
