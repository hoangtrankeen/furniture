@extends('layouts/backend/master')

@section('title','Edit Product')

@section('css')
    <link href="{{asset('backend/multiple-select/multiple-select.css')}}" rel="stylesheet"/>
@endsection

@section('content')
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
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Edit Product</h4>
                <!-- /.box-title -->

                <div class="card-content">
                    <form class="form-horizontal" action="{{route('product.update', $product->id)}}" id="product" enctype="multipart/form-data" method="post">
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sku" class="col-sm-2 control-label">SKU</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slug" class="col-sm-2 control-label">Slug</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details" class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="details" name="details" value="{{ $product->details}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" value="{{ $product->description}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categories" class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-8">

                                <select class=" categories" id="categories" name="categories[]" multiple="multiple">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ in_array($category->id, $cat_ids) ? "selected" : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="featured" class="col-sm-2 control-label">Featured</label>
                            <div class="col-xs-1">
                                <select class="form-control" id="featured" name="featured">
                                    <option value="0" {{!$product->featured ? 'selected' :''}}>No</option>
                                    <option value="1" {{$product->featured ? 'selected' :''}}>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="images" class="col-sm-2 control-label">Images</label>
                            <div class=" col-xs-8">
                                <input type="file" name="images[]" multiple value="" />
                            </div>
                        </div>


                        <div class="form-group margin-bottom-0">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>
        <!-- /.col-lg-6 col-xs-12 -->
    </div>


@endsection

@section('javascript')
    <script src="{{asset('backend/multiple-select/multiple-select.js')}}"></script>
    <script>
        $('.categories').multipleSelect({
            filter: true,
            animate: 'slide',
            minimumCountSelected: 3,
            width: 500,
            position: 'top'
        });
    </script>
@endsection