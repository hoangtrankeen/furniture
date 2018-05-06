@extends('layouts/frontend/shop')

@section('title', 'Search Results Algolia')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/web/css/algolia.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch-theme-algolia.min.css">
@endsection

@section('content')

    {{--@component('components.breadcrumbs')--}}
        {{--<a href="/">Home</a>--}}
        {{--<i class="fa fa-chevron-right breadcrumb-separator"></i>--}}
        {{--<span>Search</span>--}}
    {{--@endcomponent--}}

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="search-results-container-algolia">
            <div>
                <h2>Search</h2>
                <div id="search-box">
                    <!-- SearchBox widget will appear here -->
                </div>

                <div id="stats-container"></div>

                <div class="spacer"></div>
                <h2>Categories</h2>
                <div id="refinement-list">
                    <!-- RefinementList widget will appear here -->
                </div>
            </div>

            <div>
                <div id="hits">
                    <!-- Hits widget will appear here -->
                </div>

                <div id="pagination">
                    <!-- Pagination widget will appear here -->
                </div>
            </div>
        </div> <!-- end search-results-container-algolia -->
    </div> <!-- end container -->
    <header>
        <h1>Product Quick View</h1>
    </header>

    <ul class="cd-items cd-container">
        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->

        <li class="cd-item">
            <img src="img/item-1.jpg" alt="Item Preview">
            <a href="#0" class="cd-trigger">Quick View</a>
        </li> <!-- cd-item -->
    </ul> <!-- cd-items -->

    <div class="cd-quick-view">
        <div class="cd-slider-wrapper">
            <ul class="cd-slider">
                <li class="selected"><img src="img/item-1.jpg" alt="Product 1"></li>
                <li><img src="img/item-2.jpg" alt="Product 2"></li>
                <li><img src="img/item-3.jpg" alt="Product 3"></li>
            </ul> <!-- cd-slider -->

            <ul class="cd-slider-navigation">
                <li><a class="cd-next" href="#0">Prev</a></li>
                <li><a class="cd-prev" href="#0">Next</a></li>
            </ul> <!-- cd-slider-navigation -->
        </div> <!-- cd-slider-wrapper -->

        <div class="cd-item-info">
            <h2>Produt Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, omnis illo iste ratione. Numquam eveniet quo, ullam itaque expedita impedit. Eveniet, asperiores amet iste repellendus similique reiciendis, maxime laborum praesentium.</p>

            <ul class="cd-item-action">
                <li><button class="add-to-cart">Add to cart</button></li>
                <li><a href="#0">Learn more</a></li>
            </ul> <!-- cd-item-action -->
        </div> <!-- cd-item-info -->
        <a href="#0" class="cd-close">Close</a>
    </div> <!-- cd-quick-view -->
@endsection

@section('top-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('assets/web/js/algolia.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0"></script>
    <script src="{{ asset('assets/web/js/algolia-instantsearch.js') }}"></script>
@endsection
