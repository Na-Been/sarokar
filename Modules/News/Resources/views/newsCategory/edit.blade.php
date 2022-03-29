@extends('backend.layouts.app')
@section('title','Edit News Category')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit News Category
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('news-category.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::model($newsCat,['method'=>'PUT','route'=>['news-category.update',$newsCat->id], 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5">
                        <div
                            class="intro-y col-span-6 sm:col-span-6  p-5 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Category Title<span class="text-theme-6">*</span></div>
                            {!! Form::text('title',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Category Title']) !!}
                            {!! $errors->first('title', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-6 sm:col-span-6  p-5 {{($errors->has('order')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Order<span class="text-theme-6">*</span></div>
                            {!! Form::number('order',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Number Where You Want To Display']) !!}
                            {!! $errors->first('order', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('highlight_news_id')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Highlight News</div>
                                <select class="select2" name="highlight_news_id" style="height:40px !important">
                                    <option selected disabled>Select News To Highlight</option>
                                    @forelse($news as $new)
                                        @foreach($new as $ne)
                                        <option value="{{$ne->id}}">{{$ne->title}}</option>
                                        @endforeach
                                    @empty
{{--                                        <option selected> No News For This Category Is Available.</option>--}}
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        
                             <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mb-23 p-5">
                    <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white">
                        Save
                    </button>
                </div>
                    </div>
                  
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
