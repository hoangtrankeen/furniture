@extends('layouts/backend/master')

@section('title','All Product')

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
			<h4 class="box-title">Default</h4>
			<!-- /.box-title -->
			<div class="dropdown js__drop_down">
				<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
				<ul class="sub-menu">
					<li><a href="{{route('product.create')}}">Create Product</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else there</a></li>
					<li class="split"></li>
					<li><a href="#">Separated link</a></li>
				</ul>
				<!-- /.sub-menu -->
			</div>
			<!-- /.dropdown js__dropdown -->
			<table id="example" class="table table-striped table-bordered display" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Slug</th>
						<th>Detail</th>
						<th>Price</th>
						<th>Featured</th>
						<th>Created date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Slug</th>
						<th>Detail</th>
						<th>Price</th>
						<th>Featured</th>
						<th>Created date</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td>{{$product->name}}</td>
						<td>{{$product->slug}}</td>
						<td></td>
						<td>{{$product->price}}</td>
						<td>{{$product->featured}}</td>
						<td>{{$product->created_at}}</td>
						<td>
							<a href="" class="btn btn-xs btn-info">Edit</a>
							<a href="" class="btn btn-xs btn-danger">Delete</a>
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
@endsection