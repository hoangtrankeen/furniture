@extends('layouts/frontend/home')

@section('title', 'Products')

@section('css')

@endsection

@section('content')
    <section>
        <div class="banner-home-2">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner-shortcode-wrap style-1">
                        <a href="#">
                            <div class="banner-content">
                                <div class="banner-label-outer"><span class="banner-label">Essential</span></div><img width="600" height="375" src="{{asset('assets/images/demo/banner-h2-1.jpg')}}" alt="Charming light"/>
                                <div class="banner-content-title">
                                    <h3 class="banner-title">Charming light</h3>
                                    <div class="overlay-bg bg-6fd9ec"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner-shortcode-wrap style-1">
                        <a href="#">
                            <div class="banner-content">
                                <div class="banner-label-outer"><span class="banner-label">Essential</span></div><img width="600" height="375" src="{{asset('assets/images/demo/banner-h2-1.jpg')}}" alt="Charming light"/>
                                <div class="banner-content-title">
                                    <h3 class="banner-title">Smart classic sofa</h3>
                                    <div class="overlay-bg bg-ff9999"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner-shortcode-wrap style-1">
                        <a href="#">
                            <div class="banner-content">
                                <div class="banner-label-outer"><span class="banner-label">Essential</span></div><img width="600" height="375" src="{{asset('assets/images/demo/banner-h2-1.jpg')}}" alt="Charming light"/>
                                <div class="banner-content-title">
                                    <h3 class="banner-title">Colorful classic sofa</h3>
                                    <div class="overlay-bg bg-ffdc73"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

@endsection