@extends('layouts/backend/master')

@section('title','Edit Attribute')

@section('css')
    <style>
        .remove-attr{
            position: absolute;
            top: 10px;
            right: 25px;
            cursor: pointer;
            font-size: 18px;
            color: red;
        }

    </style>

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
                <h4 class="box-title">Chỉnh sửa thuộc tính</h4>
                <div class="card-content">
                    <form class="form-horizontal" action="{{route('attribute.update', $attribute->id)}}" id="attribute" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Tên thuộc tính</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $attribute->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Loại</label>
                            <div class="col-sm-8">
                                <input type="text" name="type" value="{{ $attribute->type}}" class="form-control" style="pointer-events: none;" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$attribute->status == 1 ? 'selected':''}}>On</option>
                                    <option value="0" {{$attribute->status == 0 ? 'selected':''}}>Off</option>
                                </select>
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
                            <input type="hidden" id="count" value="{{$attribute->attributeValue->count()}}">
                            @foreach($attribute->attributeValue as $value)
                                <div class="form-group type-toggle attr-container">
                                    <div class="col-sm-offset-2 col-sm-8 ">
                                        <input type="text" class="form-control attr_value" name="attr_value_{{$value->id++}}" value="{{$value->name}}" /> <span class="remove-attr"><i class="fa fa fa-close" aria-hidden="true" ></i></span>
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
                                    <button class="btn btn-danger waves-effect waves-light btn-icon btn-icon-left " id="add-attr"><i class="ico fa fa-plus" aria-hidden="true"></i>Gán thuộc tính sản phẩm</button>
                                </div>
                            </div>
                        @endif
                        <div class="form-group margin-bottom-0">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Lưu</button>
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
            var i = parseInt($('#count').val()) - 1 ;
            $('#add-attr').click(function (e) {
                i = i+1;
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


        $('.remove-attr').on('click', function () {
            $(this).closest('.attr-container').remove();
        });
    </script>
@endsection