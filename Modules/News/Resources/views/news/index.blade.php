@extends('backend.layouts.app')
@section('title','News List')
@section('content')
    <style type="text/css">
        .ribbon {
            background-color: #a00;
            overflow: hidden;
            white-space: nowrap;
            /* top left corner */
            position: absolute;
            left: -40px;
            top: -15px;
            /* for 45 deg rotation */
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
            /* for creating shadow */
            -webkit-box-shadow: 0 0 10px #888;
            -moz-box-shadow: 0 0 10px #888;
            box-shadow: 0 0 10px #888;
            z-index: 10;
        }

        .ribbon a {
            border: 1px solid #faa;
            color: #fff;
            display: block;
            font-size: 8px;
            margin: 1px 0;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            /* for creating shadow */
            text-shadow: 0 0 5px #444;
        }
    </style>
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                News List
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('news.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">Add New News</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible" style="overflow-x: scroll">
                <table class="table table-report -mt-2 data-table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th class="whitespace-no-wrap">Author Name</th>
                        <th class="text-center whitespace-no-wrap">News Title</th>
                        <th class="text-center whitespace-no-wrap">Posted At</th>
                        <th class="text-center whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="example_news">
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
        </div>
    </div>
@endsection
@section('js')
    @include('backend.layouts.flashMessage')

    <script type="text/javascript">
        $(function () {

            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('news.index') }}",
                columns: [
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'posted_by', name: 'posted_by'},
                    {data: 'title', name: 'title'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>

    <script>
        $('#example_news').on('click', '.bt-delete', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $(this).data('remote');
            var token = $(this).data("token");
            var id = $(this).data("id");
            // confirm then
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                        url: url,
                        type: 'post',
                        dataType: "json",
                        data: {
                            id: "id",
                            _method: 'DELETE',
                            _token: token
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText); // this line will save you tons of hours while debugging
                        },
                        success: function (json) {
                            window.location = "{{route('news.index')}}"
                            toastr.success('News Deleted Successfully');
                        },
                    }
                ).always(function (data) {
                });
            } else
                alert("You have cancelled!");
        });

    </script>
@endsection
