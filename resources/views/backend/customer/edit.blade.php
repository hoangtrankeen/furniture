@extends('layouts/backend/master')

@section('title','Create Category')

@section('css')
    <!-- Dropify -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugin/dropify/css/dropify.min.css')}}">
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
                <h4 class="box-title">Chỉnh sửa thông tin khách hàng</h4>
                <!-- /.box-title -->

                <div class="card-content">
                    <form class="form-horizontal" method="POST" action="{{ route('customer.update', $customer->id) }}">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" value="{{$customer->email}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Địa chỉ liên hệ</label>
                            <div class="col-sm-8">
                                <input type="address" class="form-control" id="address" name="address" value="{{$customer->address}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Loại</label>
                            <div class="col-sm-8">
                                <select name="type_id" id="type_id" class="form-control">
                                    @foreach($types  as  $key =>  $type)
                                        <option value="{{$key}}" {{ $customer->type_id == $key ? 'selected' : '' }}>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="col-sm-2 control-label">Mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation" class=" col-sm-2 control-label">Xác nhận mật khẩu*</label>
                            <div class="col-sm-8">
                                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" >
                            </div>
                        </div>


                        {{ csrf_field() }}
                        {{method_field('put')}}
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
    <!-- Dropify -->
    <script src="{{asset('backend/assets/plugin/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('backend/assets/scripts/fileUpload.demo.min.js')}}"></script>
@endsection