
@extends('layouts/backend/master')

@section('title','Orders')

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
    <div class="row small-spacing">
        <div class="col-xs-12">
            <div class="box-content">
{{--                  <div>{!! $chart->container() !!}</div>--}}
            </div>
            <!-- /.box-content -->
        </div>
        <!-- /.col-xs-12 -->
    </div>

@endsection

@section('javascript')
    {{--<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>--}}
    {{-- {!! $chart->script() !!}--}}
@endsection
