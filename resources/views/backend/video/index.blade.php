@extends('backend.layouts.app')
@section('title','Videos')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Video List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('video.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add
                    New Video</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2" id="example" style="width:100%">
                    <thead>
                    <tr>
                        <th class="whitespace-no-wrap">SN</th>
                        <th class="whitespace-no-wrap">Title</th>
                        <th class="whitespace-no-wrap">Link</th>
                        <th class="text-center whitespace-no-wrap">Status</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                  
                    @foreach($videos as $v)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">
                                    {!! (\Illuminate\Support\Str::words($v->title, 8 , '...')) !!}</a>
                            </td>
                            <td style="height: 20px;width: 20px">
                                <div>
                                    {!!$v->video_html !!}
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex  justify-center text-theme-9">
                                    <input class="input input--switch border video-status"
                                           {{ ($v->status == '1')?'checked':null }} type="checkbox"
                                           value="{{$v->id}}">
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a href="{{route('video.edit',[$v->id])}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['video.destroy',$v->id],'class'=>'inline']) !!}
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
            $('.video-status').on('change', function () {
                $id = $(this).val();
                $.ajax({
                    url: "video/changeStatus/" + $id,
                    type: "GET"
                });
            });
        });
    </script>
@endsection
