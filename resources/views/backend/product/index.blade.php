@extends('layouts/backend/master')

@section('title','Product')

@section('css')

@endsection

@section('content')
<div class="row small-spacing">
	<div class="col-xs-12">
		<div class="box-content">
			<h4 class="box-title">Default</h4>
			<!-- /.box-title -->
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
			<!-- /.dropdown js__dropdown -->
			<table id="example" class="table table-striped table-bordered display" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Slug</th>
						<th>Detail</th>
						<th>Price</th>
						<th>Featured</th>
						<th>Start date</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Slug</th>
						<th>Detail</th>
						<th>Price</th>
						<th>Featured</th>
						<th>Start date</th>
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

@endsection