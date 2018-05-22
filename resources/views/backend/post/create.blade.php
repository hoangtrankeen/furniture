@extends('layouts/backend/master')

@section('title','Create Post')
	<link rel="stylesheet" href="{{asset('backend/assets/plugin/select2/css/select2.min.css')}}">
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
				<h4 class="box-title">Create Post</h4>
				<!-- /.box-title -->

				<div class="card-content">
					<form class="form-horizontal" action="{{route('post.store')}}" id="category" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Title</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="title" name="title" value="{{ old('title')}}">
							</div>
						</div>
						<div class="form-group">
							<label for="slug" class="col-sm-2 control-label">Slug</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug')}}">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">Description</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="description" name="description" value="{{ old('description')}}" />
							</div>
						</div>
						<div class="form-group">
							<label for="meta_title" class="col-sm-2 control-label">Meta Title</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title')}}">
							</div>
						</div>
						<div class="form-group">
							<label for="meta_desc" class="col-sm-2 control-label">Meta Description</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="meta_desc" name="meta_desc" value="{{ old('meta_desc')}}">
							</div>
						</div>
						<div class="form-group">
							<label for="meta_keyword" class="col-sm-2 control-label">Meta Keyword</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ old('meta_keyword')}}">
							</div>
						</div>

						<div class="form-group">
							<label for="topics" class="col-sm-2 control-label">Topics</label>
							<div class="col-sm-8">
								<select class="topics form-control" id="topics" name="topics[]" multiple="multiple">
									{{ManagerCatalog::showTopicsOption($topics)}}
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="categories" class="col-sm-2 control-label">Tags</label>
							<div class="col-sm-8">
								<select class=" tags form-control" id="tags" name="tags[]" multiple="multiple">
									@foreach($tags as $tag)
										<option value="{{$tag->id}}">{{$tag->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="active" class="col-sm-2 control-label">Active</label>
							<div class="col-xs-1">
								<select class="form-control" id="active" name="active">
									<option value="0" {{ old('active') == 0 ? 'selected': ''}}>No</option>
									<option value="1" {{ old('active') == 1 ? 'selected': ''}}>Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="featured" class="col-sm-2 control-label">Featured</label>
							<div class="col-xs-1">
								<select class="form-control" id="featured" name="featured">
									<option value="0" {{ old('featured') == 0 ? 'selected': ''}}>No</option>
									<option value="1" {{ old('featured') == 1 ? 'selected': ''}}>Yes</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="featured" class="col-sm-2 control-label">Content</label>
							<div class="col-xs-1">
								<textarea name="post_content" id="post_content" cols="30" rows="10">{{old('content') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="image" class="col-sm-2 control-label">Image</label>
							<div class="col-sm-8">
								<input type="file" id="image" name="image">
							</div>
						</div>
						{{ csrf_field() }}
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

	<script type="text/javascript">
        $(document).ready(function() {
            //Select 2
            $("#topics").select2({
                placeholder: "Select Topics",
                allowClear: true
            });

            //Select 2 for tag
            $("#tags").select2({
                placeholder: "Select Tags",
                allowClear: true
            });

            previewImage('#file', 'imageThumb');
            previewImages('#files', 'imageThumbs');
        });

	</script>
@endsection