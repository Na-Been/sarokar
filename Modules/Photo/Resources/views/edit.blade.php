@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Create Blog
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('photo.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::model($photo,['method'=>'PUT','route'=>['photo.update',$photo->id], 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-6 p-5 {{($errors->has('status')) ? 'has-error':''}}">
                            <div class="mb-2">Status</div>
                            {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], $photo->status, ['class' => 'input w-full border flex-1' ,'placeholder'=>'--Select One--']) !!}
                            {!! $errors->first('status', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>

                        <div
                            class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('title')) ? 'has-error':''}} ">
                            <div
                                class="intro-y col-span-12 sm:col-span-6 p-5 {{($errors->has('image')) ? 'has-error':''}}">

                                <label for="image_label font-medium"> Image</label>
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"
                                        style="cursor: pointer">
                                       @if($photo->image)
                                             <i class="fas fa-image"></i> Change Image</a>
                                   </span>
                                    <input id="thumbnail" class="form-control" type="text" value="{{$photo->image}}" name="image">
                                    <img src="{{$photo->image}}" style="height: 5rem;">
                                    @else
                                        <i class="fas fa-image"></i> Choose Image</a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="image">
                                    @endif
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                {!! $errors->first('image', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>
                    <div class="p-5" id="standard-editor">
                        {!! Form::textarea('description',null,['class'=>'editor','placeholder' => 'Image Description']) !!}
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mb-23">
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
