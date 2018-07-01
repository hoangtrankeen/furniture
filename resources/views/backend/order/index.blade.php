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
                <h4 class="box-title">Đơn hàng</h4>
                <!-- /.box-title -->
                <div class="dropdown js__drop_down">
                    <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
                    <ul class="sub-menu">
                        <li><a href="{{route('order.create')}}">Tạo đơn hàng</a></li>
                    </ul>
                    <!-- /.sub-menu -->
                </div>
               <div class="row">
                   <div class="col-md-offset-3 col-md-5">
                       <div class="form-group">
                           <label for="sort">Lọc đơn hàng theo trạng thái</label>
                           <select name="sort" class="form-control sort-status">
                               @php $sort = request()->get('sort'); @endphp
                               <option value="0" {{$sort == 0 ? 'selected':''}}>All Order</option>
                               @foreach($statuses as $status)
                                   <option value="{{$status->id}}" {{$sort == $status->id ? 'selected': ''}}>{{$status->name}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
               </div>
                <!-- /.dropdown js__dropdown -->
                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Ngày đặt</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Ngày đặt</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{presentDateFormat($order->created_at)}}</td>
                            <td>{{$order->billing_name}}</td>
                            <td>{{presentPrice($order->billing_total)}}</td>
                            <td>{{$order->statuses->name}}</td>
                            <td>
                                <a href="{{route('order.edit', $order->id)}}" class="btn btn-xs btn-success">Sửa</a>
                            </td>
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


    <script>
        $(".sort-status").on("change", function () {
            console.log('asdad');
            var sort_value = $(this).val();
            window.location.href = window.location.origin + '/admin/order' + '?sort='+sort_value;
        });
    </script>
@endsection