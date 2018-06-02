@extends('layouts/backend/master')

@section('title','Create Product')

@section('css')
    <!-- Select2 -->
    <!-- Remodal -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugin/modal/remodal/remodal.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/plugin/modal/remodal/remodal-default-theme.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/plugin/select2/css/select2.min.css')}}">

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{asset('backend/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css')}}">
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
            <div class="box-content">
                <h4 class="box-title">View Order</h4>
                <div class="dropdown js__drop_down">
                    <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
                    <ul class="sub-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else there</a></li>
                        <li class="split"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                    <!-- /.sub-menu -->
                </div>
                <!-- /.box-title -->
                <div class="card-content">
                    <form class="form-horizontal" action="{{route('order.update', $order->id)}}" id="topic" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-content">
                                    <h4 class="box-title">Order # {{$order->id}}</h4>
                                    <table class="table">
                                        <tr>
                                            <th>Order Date</th>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Status</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Placed from IP</th>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-content">
                                    <h4 class="box-title">Account information</h4>
                                    <table class="table">
                                        <tr>
                                            <th>Customer Name</th>
                                            <td>Guest</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$order->billing_email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Customer Group</th>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-content">
                                    <h4 class="box-title">Address Information</h4>
                                    <table class="table">
                                        <tr>
                                            <th>Billing Address</th>
                                            <td>{{$order->billing_address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Billing City</th>
                                            <td>{{$order->billing_city}}</td>
                                        </tr><tr>
                                            <th>Billing Province</th>
                                            <td>{{$order->billing_province}}</td>
                                        </tr>
                                        <tr>
                                            <th>Billing Postal Code</th>
                                            <td>{{$order->billing_postalcode}}</td>
                                        </tr>
                                        <tr>
                                            <th>Billing Phone</th>
                                            <td>{{$order->billing_phone}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6">

                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label for="categories" class="col-sm-2 control-label">Parent Topic</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<select class=" topic form-control" id="parent_id" name="parent_id">--}}
                                    {{--<option value="0">-----</option>--}}
                                    {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{$category->id}}" {{($category->id) == ($thiscat->parent_id) ? 'selected':'' }}>{{$category->name}}</option>--}}
                                        {{--@if(count($category->children))--}}
                                            {{--@include('backend/topic/in_edit',['children' => $category->children, 'html'=>''])--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

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
    <!-- Select2 -->
    <script src="{{asset('backend/assets/plugin/select2/js/select2.min.js')}}"></script>

    <!-- Multi Select -->
    <script src="{{asset('backend/assets/plugin/multiselect/multiselect.min.js')}}"></script>

    <!-- Data Tables -->
    <script src="{{asset('backend/assets/plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/scripts/datatables.demo.min.js')}}"></script>

@endsection