@extends('layouts/backend/master')

@section('title','Edit Topic')

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
                <h4 class="box-title">Edit Topic</h4>
                <!-- /.box-title -->

                <div class="card-content">
                    <form class="form-horizontal" action="{{route('topic.update', $thiscat->id)}}" id="topic" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{$thiscat->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slug" class="col-sm-2 control-label">Slug</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="slug" name="slug" value="{{$thiscat->slug}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categories" class="col-sm-2 control-label">Parent Topic</label>
                            <div class="col-sm-8">
                                <select class=" topic form-control" id="parent_id" name="parent_id">
                                    <option value="0">-----</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{($category->id) == ($thiscat->parent_id) ? 'selected':'' }}>{{$category->name}}</option>
                                        @if(count($category->children))
                                            @include('backend/topic/in_edit',['children' => $category->children, 'html'=>''])
                                        @endif
                                    @endforeach
                                </select>
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

@endsection