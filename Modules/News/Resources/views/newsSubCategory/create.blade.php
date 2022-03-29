@extends('backend.layouts.app')
@section('title','Create News Sub Category')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Create News Sub Category
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('news-sub-category.index')}}"
                   class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::open(['method'=>'post','route'=>'news-sub-category.store', 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('category_id')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Category Title<span class="text-theme-6">*</span> </div>
                            {!! Form::select('category_id',$categories->pluck('title','id'),null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Category Title']) !!}
                            {!! $errors->first('category_id', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('sub_category_name')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Sub Category Name<span class="text-theme-6">*</span> </div>
                            {!! Form::text('sub_category_name',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Category Order']) !!}
                            {!! $errors->first('sub_category_name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>

                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mb-23 p-5">
                        <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        <!-- END: Document Editor -->
        </div>
    </div>
@endsection

@section('js')
    @include('backend.layouts.flashMessage')
@endsection
