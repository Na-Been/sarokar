@extends('backend.layouts.app')
@section('title','Show News')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                News Detail
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('news.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">News</a>
            </div>
        </div>
        <div class="intro-y news p-5 box mt-8">
            <!-- BEGIN: News Layout -->
            <h2 class="intro-y font-medium text-xl sm:text-2xl">
                {{$news->title}}
            </h2>
            <div class="intro-y text-gray-700 dark:text-gray-600 mt-3 text-xs sm:text-sm"><span
                    class="mx-1">•</span>
                {!! $news->created_at??''!!}
            </div>
            <div class="intro-y mt-6">
                <div class="news__preview image-fit">
                    @if($news->feature_image != null)
                        <img class="rounded-md" src="{{$news->feature_image}}">
                    @else
                        <img class="rounded-md" src="{{asset('uploads/default.jpg')}}">
                    @endif
                </div>
            </div>
            <div class="intro-y text-justify leading-relaxed">
                <p class="mb-5">{!! $news->description !!}</p>
            </div>
            <div
                class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-gray-200 dark:border-dark-5">
                <div class="flex items-center">
                    <div class="w-12 h-12 flex-none image-fit">
                        @if($news->author_image)
                            <img class="rounded-full" src="{{$news->author_image}}">
                        @else
                        <img class="rounded-full" src="{{asset('uploads/users/dummyUser.png')}}">
                        @endif
                    </div>
                    <div class="ml-3 mr-auto">
                        Author : <a href="" class="font-medium">{{$news->posted_by}}</a>
                    </div>
                </div>
            </div>
            <!-- END: News Layout -->
        </div>
    </div>
@endsection

@section('js')
    @include('backend.layouts.flashMessage')
@endsection
