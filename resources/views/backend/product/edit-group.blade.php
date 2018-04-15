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
                <h4 class="box-title">Edit Group Product</h4>
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
                    <form class="form-horizontal" action="{{route('product-group.update', $product->id)}}" id="product" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sku" class="col-sm-2 control-label">SKU</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="slug" class="col-sm-2 control-label">Slug</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="details" class="col-sm-2 control-label">Details</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="details" name="details" value="{{ $product->details }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categories" class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-8">
                                <select class=" categories form-control" id="categories" name="categories[]" multiple="multiple">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ in_array($category->id, $cat_ids) ? "selected" : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="featured" class="col-sm-2 control-label">Featured</label>
                            <div class="col-xs-1">
                                <select class="form-control" id="featured" name="featured">
                                    <option value="0" {{$product->featured == 0 ? 'selected' : ''}} >No</option>
                                    <option value="0" {{$product->featured == 1 ? 'selected' : ''}} >Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visibility" class="col-sm-2 control-label">Visibility</label>
                            <div class="col-xs-1">
                                <select class="form-control" id="visibility" name="visibility">
                                    <option value="0" {{$product->visibility == 0 ? 'selected' : ''}} >No</option>
                                    <option value="0" {{$product->visibility == 1 ? 'selected' : ''}} >Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="active" class="col-sm-2 control-label">Active</label>
                            <div class="col-xs-1">
                                <select class="form-control" id="active" name="active">
                                    <option value="0" {{$product->active == 0 ? 'selected' : ''}} >No</option>
                                    <option value="0" {{$product->active == 1 ? 'selected' : ''}} >Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="in_stock" class="col-sm-2 control-label">In Stock</label>
                            <div class="col-xs-1">
                                <select class="form-control" id="in_stock" name="in_stock">
                                    <option value="0" {{$product->in_stock == 0 ? 'selected' : ''}} >No</option>
                                    <option value="0" {{$product->in_stock == 1 ? 'selected' : ''}} >Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="images" class="col-sm-2 control-label">Images</label>
                            <div class=" col-xs-8">
                                <input type="file" name="images[]" multiple  id="files" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sort_order" class="col-sm-2 control-label">Sort order</label>
                            <div class="col-sm-8">
                                <input type="number" min="1" class="form-control" id="sort_order" name="sort_order" value="{{ $product->sort_order }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="col-sm-2 control-label">Meta Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $product->meta_title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_desc" class="col-sm-2 control-label">Meta Description</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meta_desc" name="meta_desc" value="{{ $product->meta_desc }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword" class="col-sm-2 control-label">Meta Keyword</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ $product->meta_keyword }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="button" class="btn btn-success margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#boostrapModal-2">Select Product for Group</button>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <input type="hidden" class="form-control" id="type_id" name="type_id" value="group">
                        <input type="hidden" class="form-control" id="child_product" name="child_product" value="{{($product->child_id)}}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
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

@section('modal')
    <div class="modal fade" id="boostrapModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel-1">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row small-spacing">
                        <div class="col-xs-12">
                            <div class="box-content">
                                <h4 class="box-title">Default</h4>
                                <!-- /.box-title -->
                                <div class="dropdown js__drop_down">
                                    <a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Create Product</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else there</a></li>
                                        <li class="split"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                    <!-- /.sub-menu -->
                                </div>
                                <!-- /.dropdown js__dropdown -->
                                <table id="product-table" class="table table-bordered display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>SKU</th>
                                        <th>Price</th>
                                        <th>Featured</th>
                                        <th>Created date</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>SKU</th>
                                        <th>Price</th>
                                        <th>Featured</th>
                                        <th>Created date</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php
                                        $child_list = json_decode($product->child_id);

                                        $child_list = ($child_list)? $child_list : [];

                                    @endphp
                                    @foreach($all_products as $product)

                                        <tr class="{{in_array($product->id, $child_list) ? 'color-toggle': ''}}">
                                            <td><a href="{{route('product-group.edit', $product->id )}}"  data-value="{{$product->id}}">{{$product->name}}</a></td>
                                            <td>{{$product->sku}}</td>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <!-- Select2 -->
    <script src="{{asset('backend/assets/plugin/select2/js/select2.min.js')}}"></script>

    <!-- Multi Select -->
    <script src="{{asset('backend/assets/plugin/multiselect/multiselect.min.js')}}"></script>

    <!-- Full Screen Plugin -->
    <script src="{{asset('backend/assets/plugin/fullscreen/jquery.fullscreen-min.js')}}"></script>

    <!-- Remodal -->
    <script src="{{asset('backend/assets/plugin/modal/remodal/remodal.min.js')}}"></script>

    <!-- Data Tables -->
    <script src="{{asset('backend/assets/plugin/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/scripts/datatables.demo.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //Select 2
            $(".categories").select2({
                placeholder: "Select categories",
                allowClear: true
            });

            //Image Preview
            if(window.File && window.FileList && window.FileReader) {
                $("#files").on("change",function(e) {
                    var imgThumb = document.getElementById('imageThumb');
                    if (document.contains(document.getElementById('imageThumb'))) {
                        imgThumb.remove();
                    }


                    var files = e.target.files ,
                        filesLength = files.length ;
                    for (var i = 0; i < filesLength ; i++) {
                        var f = files[i];
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<img></img>",{
                                class : "imageThumb",
                                id : "imageThumb",
                                src : e.target.result,
                                title : file.name
                            }).insertAfter("#files");
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else { alert("Your browser doesn't support to File API") }
        });

    </script>

    <!--Select product-->
    <script>
        $(document).ready(function() {
            var arr =[];

            var ChildProduct = $('#child_product');

            if(ChildProduct.val().length > 0){
                arr = JSON.parse(ChildProduct.val());

                arr = arr.map(function (x) {
                    return parseInt(x,10);
                });
            }

            console.log(arr);

            var table = $('#product-table').DataTable();

            $('#product-table tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                $(this).toggleClass('color-toggle');
                var nameCol = data[0];

                var id = parseInt($(nameCol).attr('data-value'));

                if($.inArray(id, arr) !== -1){
                    i = arr.indexOf(id);

                    arr.splice(i,1);
                }else{
                    arr.push(id);
                }

                arr = JSON.stringify(arr);

                ChildProduct.val(arr);

                console.log(arr);
            } );
        } );
    </script>

@endsection