@extends('frontend/layouts/shop')

@section('title', 'Đăng nhập')

@section('css')
@endsection

@section('content')
   <div class="bg0 m-t-40 p-b-140 flex-change">
        <div class="row">
            <div class="column main col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="login-container row">
                    <div class="col-sm-6 col-xs-12 margin-bottom50">
                        <div class="block block-customer-login">
                            <div class="block-title">
                                <h2 class="title" id="block-customer-login-heading" role="heading" aria-level="2"><span>Khách hàng đã đăng kí</span></h2>
                            </div>
                            <div class="block-content">
                                <form action="">
                                    <div class="field-note">If you have an account, sign in with your email address.</div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mật khẩu</label>
                                        <input type="text">
                                    </div>
                                    <div class="from-group">
                                        <button type="submit">Đăng nhập</button>
                                    </div>
                                </form>
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
