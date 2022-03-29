@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Blog List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('blog.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add New Blog</a>
            </div>
        </div>
        <div class="intro-y grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Blog Layout -->
            @foreach($blogs as $blog)
                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                    <div class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                        <div class="w-10 h-10 flex-none image-fit">
                            <img class="rounded-full" src="{{asset('uploads/users/dummyUser.png')}}">
                        </div>
                        <div class="ml-3 mr-auto">
                            <a href="" class="font-medium">{{$blog->createdBy->name}}</a>
                            <div class="flex text-gray-600 truncate text-xs mt-1"><a
                                    class="text-theme-1 dark:text-theme-10 inline-block truncate" href="">{{$blog->category->title}}</a>
                                <span class="mx-1">•</span>
                                {{$blog->created_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="dropdown ml-3">
                            <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-500 dark:text-gray-300"> <i
                                    data-feather="more-vertical" class="w-4 h-4"></i> </a>
                            <div class="dropdown-box w-40">
                                <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                    <a href="{{route('blog.edit',[$blog->id])}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['blog.destroy',$blog->id],'class'=>'inline']) !!}
                                    <button type="submit"
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                            onclick="javascript:return confirm('Are you sure you want to delete?');">
                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete</a>
                                    </button>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="h-40 xxl:h-56 image-fit">
                            @if($blog->image != null)
                                <img class="rounded-md" src="{{url('uploads/blog',$blog->image)}}">
                            @else
                                <img class="rounded-md" src="{{asset('uploads/default.jpg')}}">
                            @endif
                        </div>
                        <a href="{{route('blog.show',[$blog->id])}}" class="block font-medium text-base mt-5">
                            {{$blog->title}}
                        </a>
                        <div class="text-gray-700 dark:text-gray-600 mt-2">
                            {!! (\Illuminate\Support\Str::words($blog->description, 30, '...')) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$blogs->links()}}
    </div>
@endsection

@section('js')
    @include('backend.layouts.flashMessage')
@endsection
