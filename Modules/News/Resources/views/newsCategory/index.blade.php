@extends('backend.layouts.app')
@section('title','News Category List')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                News Category List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('news-category.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Create
                    New News Category</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="i   ntro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2" id="example" style="width:100%">
                    <thead>
                    <tr>
                        <th class="whitespace-no-wrap">SN</th>
                        <th class="whitespace-no-wrap">Category Name</th>
                        <th class="whitespace-no-wrap">Order</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsCategories as $category)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">
                                    {{$category->title}}
                                </a>
                                @if($category->highlight_news_id)
                                    <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5 ml-4">
                                        @foreach($highlightNews as $highlight)
                                            @foreach($highlight as $hl)
                                                {{$hl}}
                                            @endforeach
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                            <td class="w-40">
                                {{$category->order}}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a href="{{route('news-category.edit',$category->id)}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['news-category.destroy',$category->id],'class'=>'inline']) !!}
                                    <button type="submit"
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                            onclick="javascript:return confirm('Are you sure you want to delete?');">
                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete</a>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
    </div>
@endsection

@section('js')
    @include('backend.layouts.flashMessage')
@endsection
