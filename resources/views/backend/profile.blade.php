@extends('backend.layouts.app')
@section('title','Profile')
@section('content')
    <div class="content">
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Update Profile
            </h2>
        </div>
        {{--        @dd($user->avatar)--}}
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                <div class="intro-y box mt-5">
                    <div class="relative flex items-center p-5">
                        <div class="w-12 h-12 image-fit">
                            @if($user->avatar)
                                <img alt="Dummy" class="rounded-md"
                                     src="{{asset('image/'.$user->avatar)}}">
                            @else
                                <img alt="Dummy" class="rounded-md"
                                     src="{{asset('uploads/users/dummyUser.png')}}">
                            @endif
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{$user->name}}</div>
                            <div class="text-gray-600">{{$user->email}}</div>
                        </div>
                    </div>
                    <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                        <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                            Personal Information </a>
                    </div>
                </div>
            </div>
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                <!-- BEGIN: Display Information -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Display Information
                        </h2>
                    </div>
                    <div class="p-5">
                        {!! Form::model($user,['method'=>'put','route'=>['profile.update'], 'enctype'=>'multipart/form-data']) !!}
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 xl:col-span-4">
                                <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                    <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                        @if($user->avatar)
                                            <img alt="Dummy" class="rounded-md" id="previewImg"
                                                 src="{{asset('image/'.$user->avatar)}}">
                                        @else
                                            <img alt="Dummy" class="rounded-md" id="previewImg"
                                                 src="{{asset('uploads/users/dummyUser.png')}}">
                                        @endif

                                    </div>
                                    <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="button w-full bg-theme-1 text-white">Change Photo
                                        </button>
                                        <input type="file" name="avatar"
                                               class="w-full h-full top-0 left-0 absolute opacity-0"
                                               onchange="previewFile(this);">

                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-8">
                                <div>
                                    <label>Display Name</label>
                                    {!! Form::text('name',null,['class'=>'input w-full border bg-gray-100 mt-2','placeholder' => 'Full Name']) !!}
                                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}

                                    <label>Email Address</label>
                                    {!! Form::text('email',null,['class'=>'input w-full border bg-gray-100 mt-2','placeholder' => '']) !!}
                                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}

                                    <div class="mt-3">
                                        <label for="new">New password</label>
                                        <input name="password" type="password"
                                               class="input w-full border bg-gray-100 mt-2" id="new">
                                        {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <div class="mt-3">
                                        <label for="confirm">Confirm password</label>
                                        <input name="password_confirmation" type="password"
                                               class="input w-full border bg-gray-100 mt-2"
                                               id="confirm">
                                        {!! $errors->first('password_confirmation', '<span class="text-danger">:message</span>') !!}
                                    </div>
                                    <button type="submit" class="button w-20 bg-theme-1 text-white mt-3">Save</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('js')
            @include('backend.layouts.flashMessage')
            <script>
                function previewFile(input) {
                    var file = $("input[type=file]").get(0).files[0];

                    if (file) {
                        var reader = new FileReader();

                        reader.onload = function () {
                            $("#previewImg").attr("src", reader.result);
                        }

                        reader.readAsDataURL(file);
                    }
                }
            </script>
@endsection
