@extends('layouts/backend/master')

@section('title','Create Attribute Value')

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
                <h4 class="box-title">Create Attribute Value</h4>
                <!-- /.box-title -->

                <div class="card-content">
                    <form class="form-horizontal" action="{{route('attribute-value.store')}}" id="attribute" method="post">
                        <div class="form-group">
                            <label for="attribute_id" class="col-sm-2 control-label">Attribute</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="attribute_id" name="attribute_id">
                                    @foreach($attributes as $attribute)
                                        <option value="{{$attribute->id}}" {{ ($attribute->id == old('attribute')) ? "selected" : ''}}>{{$attribute->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
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