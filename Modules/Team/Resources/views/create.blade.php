@extends('backend.layouts.app')
@section('title','Add Team')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Add New Team
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('team.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::open(['method'=>'post','route'=>'team.store', 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5 p-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-12  p-5 {{($errors->has('name')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Name <span class="text-theme-6">*</span></div>
                            {!! Form::text('name',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Name']) !!}
                            {!! $errors->first('name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-12  p-5 {{($errors->has('designation')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Designation <span class="text-theme-6">*</span></div>
                            {!! Form::textarea('designation',null,['class' => 'input w-full border flex-1','rows'=> 3,'placeholder'=>'Enter Designation']) !!}
                            {!! $errors->first('designation', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-7 p-5 {{($errors->has('image')) ? 'has-error':''}}">
                            <div class="font-medium">
                                <label for="image_label font-medium">Image</label>
                            </div>
                            <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" style="cursor: pointer!important;" data-input="thumbnail1" data-preview="holder" class="btn btn-primary" >
                                       <i class="fas fa-image"></i> Choose Feature Image</a>
                                   </span>
                                <input id="thumbnail1" class="form-control" type="text" name="image">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                            {!! $errors->first('image', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mb-23 p-5">
                        <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white">
                            Save
                        </button>
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
