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
                                <select class="form-control" id="type" name="type">
                                    @foreach($attr_types as $type)
                                        <option value="{{$type}}" {{ ($type == $attribute->type) ? "selected" : ''}}>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inform_name" class="col-sm-2 control-label">Name in form</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inform_name" name="inform_name" value="{{ $attribute->inform_name }}">
                            </div>
                        </div>
                        @if(!empty($attribute->attributeValue))
                            @php $i = 1; $count = count($attribute->attributeValue); @endphp
                            @foreach($attribute->attributeValue as $value)
                                <div class="form-group type-toggle">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <input type="text" class="form-control attr_value" name="attr_value_{{$i++}}" value="{{$value->name}}" />
                                    </div>
                                </div>
                            @endforeach

                            <input type="hidden" value="{{$count}}" name="count" id="count">
                        @endif

                        <div class="form-group type-toggle">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button class="btn btn-danger waves-effect waves-light btn-icon btn-icon-left " id="add-attr"><i class="ico fa fa-plus" aria-hidden="true"></i>Add attribute value</button>
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

    <script>
        $(document).ready(function () {
            var i = parseInt($( "input[name$='count']" ).val());
            $('#add-attr').click(function (e) {
                e.preventDefault();
                i = i + 1;
                $("input[name='attr_value_1']").clone().attr('name','attr_value_'+i).val('').insertBefore('#add-attr');
            });

            function checkFirstType(){
                if($('#type').val() === 'select'){
                    $('.type-toggle').show();
                }
            }

            checkFirstType();

            $('#type').on('change',function () {

                if($(this).val() === 'text'){
                    $('.type-toggle').hide();
                }

                if($(this).val() === 'select'){
                    $('.type-toggle').show();
                }

            });
        });
    </script>
@endsection