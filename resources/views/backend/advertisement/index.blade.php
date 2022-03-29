@extends('backend.layouts.app')
@section('title','Advertisement')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Advertisement List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('advertisement.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Create
                    New Ad</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2" id="example" style="width:100%">
                    <thead>
                    <tr>
                        <th class="whitespace-no-wrap">SN</th>
                        <th class="whitespace-no-wrap">Image</th>
                        <th class="whitespace-no-wrap">Title</th>
                        <th class="whitespace-no-wrap">Rank</th>
                        <th class="whitespace-no-wrap">Page</th>
                        <th class="text-center whitespace-no-wrap">Status</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ads as $ad)
                        <tr class="intro-x">
                            <td class="w-40" style="width: 40px;">
                                {{$loop->iteration}}
                            </td>
                            <td class="w-40 sorting_1" style="overflow: hidden; width: 40px;">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img title="Created at {{$ad->created_at}}" alt="news image"
                                             class="tooltip rounded-full" src="{{$ad->image}}">
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">{{$ad->title}}</a>
                            </td>
                            <td>{{$ad->rank}}</td>
                            <td>
                                @if($ad->page == 1)
                                    Home Page
                                @elseif($ad->page == 2)
                                    News Details Page
                                @elseif($ad->page == 3)
                                    Category Page
                                @else
                                    Sub Category Page
                                @endif
                            </td>
                            <td class="w-40">
                                <div class="flex  justify-center text-theme-9">
                                    <input class="input input--switch border advertisement-status"
                                           {{ ($ad->status == '1')?'checked':null }} type="checkbox"
                                           value="{{$ad->id}}">
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a href="{{route('advertisement.edit',[$ad->id])}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['advertisement.destroy',$ad->id],'class'=>'inline']) !!}
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
    <script>
        $(document).ready(function () {
            $('.advertisement-status').on('change', function () {
                $id = $(this).val();
                $.ajax({
                    url: "advertisement/changeStatus/" + $id,
                    type: "GET"
                });
            });
        });
    </script>
@endsection
