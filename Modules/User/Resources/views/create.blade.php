@extends('user::layouts.master')
@section('title','Add User')
@section('content')
    <!-- END: Top Bar -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')

    <!-- END: Top Bar -->
        <div class="flex items-center mt-8">
            <h2 class="intro-y text-lg font-medium mr-auto">
                User Create
            </h2>
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <a href="{{route('user.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <!-- BEGIN: Wizard Layout -->
        <div class="intro-y box">
            {!! Form::open(['method'=>'post','url'=>'backend/user', 'enctype'=>'multipart/form-data']) !!}
            <div class="p-5  border-t border-gray-200 dark:border-dark-5">
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                    <div class="intro-y col-span-12 sm:col-span-6 {{($errors->has('name')) ? 'has-error':''}} ">
                        <div class="mb-2 font-medium">Name<span class="text-theme-6">*</span></div>
                        {!! Form::text('name',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Full Name']) !!}
                        {!! $errors->first('name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 {{($errors->has('email')) ? 'has-error':''}}">
                        <div class="mb-2 font-medium">Email<span class="text-theme-6">*</span></div>
                        {!! Form::email('email',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Email Address']) !!}
                        {!! $errors->first('email', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6 {{($errors->has('role')) ? 'has-error':''}}">
                        <div class="mb-2 font-medium">Role<span class="text-theme-6">*</span></div>
                        {!! Form::select('role', ['admin' => 'Admin', 'editor' => 'Editor'], 'admin', ['class' => 'input w-full border flex-1']) !!}
                        {!! $errors->first('role', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                    </div>

                    <div class="intro-y col-span-12 sm:col-span-6 {{($errors->has('status')) ? 'has-error':''}}">
                        <div class="mb-2 font-medium">Status<span class="text-theme-6">*</span></div>
                        {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], 'active', ['class' => 'input w-full border flex-1']) !!}
                        {!! $errors->first('status', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                    </div>

                        <div
                            class="intro-y col-span-12 sm:col-span-6 p-0 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div
                                class="intro-y col-span-12 sm:col-span-6 p-0 {{($errors->has('image')) ? 'has-error':''}}">

                                <label for="image_label" class="mb-2 font-medium"> User Image</label>
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"
                                        style="cursor: pointer">
                                       <i class="fas fa-image"></i> Choose Image</a>
                                   </span>
                                    <input id="thumbnail" class="form-control" type="text" name="avatar">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                {!! $errors->first('image', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                        </div>

                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Save
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
            <!-- END: Wizard Layout -->
        </div>
        @endsection
        @section('js')
            @include('backend.layouts.flashMessage')
            <script src="{{ asset('vendor/file-manager/js/filemanager.js') }}"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // set fm height
                    // document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');
                    document.getElementById('lfm').setAttribute('style', 'height:' + window.innerHeight + 'px');
                    document.getElementById('lfm2').setAttribute('style', 'height:' + window.innerHeight + 'px');

                    // Add callback to file manager
                    fm.$store.commit('fm/setFileCallBack', function (fileUrl) {
                        window.opener.fmSetLink(fileUrl);
                        window.close();
                    });
                });
            </script>
@endsection
