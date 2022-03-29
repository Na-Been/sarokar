@extends('backend.layouts.app')
@section('title','File Manager')
@section('content')
    <iframe src="{{url('/').'/filemanager'}}" style="width: 100%"></iframe>
@endsection
