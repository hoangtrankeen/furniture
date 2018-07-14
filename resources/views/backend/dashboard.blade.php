
@extends('layouts/backend/master')

@section('title','Orders')

@section('css')

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
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="box-content">
                <h4 class="box-title">Thống kê số lượng sản phẩm đã bán</h4>
                {{--<div class="col-md-offset-9 col-md-3">--}}
                    {{--<select name="month" id="month" class="  form-control">--}}
                        {{--@foreach($months as  $k => $m)--}}
                            {{--<option value="{{$k}}" {{request()->get('month') == $k ? 'selected':''}}>{{$m}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Ngày tạo</th>
                        <th>Số lượng</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Tên</th>
                        <th>Ngày tạo</th>
                        <th>Số lượng</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><a href="{{route('product.edit', $product->id )}}">{{$product->name}}</a></td>
                            <td>{{presentDate($product->created_at)}}</td>
                            <td>{{$product->sell}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-content -->
        </div>
        <!-- /.col-xs-12 -->
    </div>

@endsection

@section('javascript')
    <!-- Data Tables -->
    <script src="{{asset('backend/assets/plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/scripts/datatables.demo.min.js')}}"></script>
@endsection
