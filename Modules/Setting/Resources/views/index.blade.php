@extends('backend.layouts.app')
@section('title','Setting')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Update Setting
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('setting.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::open(['method'=>'post','route'=>'setting.index', 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div
                                class="intro-y col-span-12 sm:col-span-6 p-5 {{($errors->has('image')) ? 'has-error':''}}">

                                <label for="image_label font-medium"> Site Logo</label>
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"
                                        style="cursor: pointer">
                                   @if(getSetting('logo'))
                                             <i class="fas fa-image"></i> Change Image</a>
                                   </span>
                                    <input id="thumbnail" class="form-control" type="text"
                                           value="{{getSetting('logo')}}" name="logo">
                                    <img src="{{getSetting('logo')}}" style="height: 5rem;">
                                    @else
                                        <i class="fas fa-image"></i> Choose Image</a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="logo">
                                    @endif
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                {!! $errors->first('image', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('site_title')) ? 'has-error':''}} ">
                            <div class="mb-2 ">Site Title <span class="text-theme-6">*</span></div>
                            {!! Form::text('site_title',getSetting('site_title'),['class' => 'input w-full border flex-1','placeholder'=>'Enter Blog Title']) !!}
                            {!! $errors->first('site_title', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('phone_number')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Phone Number <span class="text-theme-6">*</span></div>
                            {!! Form::text('phone_number',getSetting('phone_number'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Company Phone Number']) !!}
                            {!! $errors->first('phone_number', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('mobile_number')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Mobile Number <span class="text-theme-6">*</span></div>
                            {!! Form::text('mobile_number',getSetting('mobile_number'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Company Mobile Number']) !!}
                            {!! $errors->first('mobile_number', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('email')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Email Address <span class="text-theme-6">*</span></div>
                            {!! Form::email('email',getSetting('email'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Email']) !!}
                            {!! $errors->first('email', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('postal_code')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Postal Code</div>
                            {!! Form::text('postal_code',getSetting('postal_code'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Postal Code']) !!}
                            {!! $errors->first('postal_code', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('address')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Address <span class="text-theme-6">*</span></div>
                            {!! Form::textarea('address',getSetting('address'),['class'=>'input w-full border flex-1', 'rows'=> 2, 'placeholder'=>'Enter Address']) !!}
                            {!! $errors->first('address', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('registration_number')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Registration Number</div>
                            {!! Form::text('registration_number',getSetting('registration_number'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Registration Number']) !!}
                            {!! $errors->first('registration_number', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('facebook_link')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Facebook Link</div>
                            {!! Form::url('facebook_link',getSetting('facebook_link'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Facebook Link']) !!}
                            {!! $errors->first('facebook_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('linkedin_link')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Linkedin Link</div>
                            {!! Form::url('linkedin_link',getSetting('linkedin_link'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Linkedin Link']) !!}
                            {!! $errors->first('linkedin_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('instagram_link')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Instagram Link</div>
                            {!! Form::url('instagram_link',getSetting('instagram_link'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Instagram Link']) !!}
                            {!! $errors->first('instagram_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('twitter_link')) ? 'has-error':''}} ">
                            <div class="mb-2 font-medium">Twitter Link</div>
                            {!! Form::url('twitter_link',getSetting('twitter_link'),['class'=>'input w-full border flex-1','placeholder'=>'Enter Twitter Link']) !!}
                            {!! $errors->first('twitter_link', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
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
@endsection
