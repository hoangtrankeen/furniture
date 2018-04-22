@extends('layouts/backend/master')

@section('title','Edit Attribute')

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
                <h4 class="box-title">Edit Attribute</h4>
                <!-- /.box-title -->
                <div class="dropdown js__drop_down">
                    <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
                    <ul class="sub-menu">
                        <li><a href="{{route('attribute.create')}}">Create attribute</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else there</a></li>
                        <li class="split"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                    <!-- /.sub-menu -->
                </div>
                <div class="card-content">
                    <form class="form-horizontal" action="{{route('attribute.update', $attribute->id)}}" id="attribute" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $attribute->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-8">
                                <input type="text" name="type" value="{{ $attribute->type}}" class="form-control" >
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label for="inform_name" class="col-sm-2 control-label">Name in form</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inform_name" name="inform_name" value="{{ $attribute->inform_name }}">
                            </div>
                        </div>-->
                        @if(!empty($attribute->attributeValue) && $attribute->type =='select')
                            @php $i = 1; @endphp
                            @foreach($attribute->attributeValue as $value)
                                <div class="form-group type-toggle">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <input type="text" class="form-control attr_value" name="attr_value_{{$i++}}" value="{{$value->name}}" />
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group type-toggle hide-me" >
                                <div class="col-sm-offset-2 col-sm-8">
                                    <input type="text" class="form-control attr_value" name="new_attr_value_1" />
                                </div>
                            </div>

                            <div class="form-group type-toggle">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <button class="btn btn-danger waves-effect waves-light btn-icon btn-icon-left " id="add-attr"><i class="ico fa fa-plus" aria-hidden="true"></i>Add attribute value</button>
                                </div>
                            </div>
                        @endif
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

    <script>
        $(document).ready(function () {
            var i = 0;
            $('#add-attr').click(function (e) {
                e.preventDefault();
                $("input[name='new_attr_value_1']").clone().removeClass('hide-me').attr('name','new_attr_value_'+(i+1)).val('').insertBefore('#add-attr');
            });

            function checkFirstType(){
                if($('#type').val() === 'select'){
                    $('.type-toggle').show();
                }
            }
            checkFirstType();
        });
    </script>
@endsection