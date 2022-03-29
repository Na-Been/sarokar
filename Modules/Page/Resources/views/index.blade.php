@extends('backend.layouts.app')
@section('title','List Pages')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Page List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('page.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Create New Page</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2" id="example" style="width:100%">
                    <thead>
                    <tr>
                        <th class="whitespace-no-wrap">SN</th>
                        <th class="whitespace-no-wrap">Page Title</th>
                        <th class="whitespace-no-wrap">Parent Page</th>
                        <th class="whitespace-no-wrap">Child Page</th>
                        <th class="text-center whitespace-no-wrap">Status</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    @foreach($pages as $page)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{$i++}}
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap">{{$page->title}}</a>
                            </td>
                            <td>
                                {{($page->parent_id == 0)?'--': \App\Repo\PageRepo::getParentName($page->parent_id)}}
                            </td>
                            <td>
                                <div class="flex  text-theme-9">
                                    <a href="{{url('/backend/page/?id='. $page->id)}}"><i data-feather="check-square"
                                                                                          class="w-4 h-4 mr-2"></i></a>
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex  justify-center text-theme-9">
                                    <input class="input input--switch border page-status"
                                           {{ ($page->status == '1')?'checked':null }} type="checkbox"
                                           value="{{$page->id}}">
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a href="{{route('page.edit',[$page->id])}}"
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route'=>['page.destroy',$page->id],'class'=>'inline']) !!}
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
            $('.page-status').on('change', function () {
                $id = $(this).val();
                $.ajax({
                    url: "page/changeStatus/" + $id,
                    type: "GET"
                });
            });
        });
    </script>
@endsection
