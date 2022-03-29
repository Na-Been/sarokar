@extends('backend.layouts.app')
@section('header')
     File Manager
@stop
@section('subHeader')
    File manger
@stop
@section('breadcrumb')
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header">

                </div>
                <div class="box-body">
                    @include('file-manager.iframe')
                </div>
                <div class="box-footer">
                </div>
            </div>
        </div>
    </div>
@endsection

