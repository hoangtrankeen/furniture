@extends('layouts/backend/master')

@section('title','Create Product')

@section('css')
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
                <h4 class="box-title">Create Product</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form class="form-horizontal" action="{{route('product.store')}}" id="product" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
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
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details" class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="details" name="details" value="{{ old('details')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categories" class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="categories" name="categories" >
                                    <option value="">Nothing selected</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ ($category->id == old('categories')) ? "selected" : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="featured" class="col-sm-2 control-label">Featured</label>
                            <div class="col-xs-1">
                                <select class="form-control" id="featured" name="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="images" class="col-sm-2 control-label">Images</label>
                            <div class=" col-xs-8">
                                <input type="file" name="images[]" multiple />
                            </div>
                        </div>
                        {{ csrf_field() }}
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

@endsection