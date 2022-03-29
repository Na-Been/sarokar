@extends('backend.layouts.app')
@section('title','Edit Team')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Team
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('team.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::model($team,['method'=>'PUT','route'=>['team.update',$team->id], 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5 p-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-12  p-5 {{($errors->has('name')) ? 'has-error':''}} ">
                            <div class="mb-2">Name</div>
                            {!! Form::text('name',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter Name']) !!}
                            {!! $errors->first('name', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                        </div>
                        <div
                            class="intro-y col-span-12 sm:col-span-12  p-5 {{($errors->has('designation')) ? 'has-error':''}} ">
                            <div class="mb-2">Designation</div>
                            {!! Form::textarea('designation',null,['class' => 'input w-full border flex-1','rows'=> 3,'placeholder'=>'Enter Designation']) !!}
                            {!! $errors->first('designation', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
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
                                       @if($team->image)
                                             <i class="fas fa-image"></i> Change Image</a>
                                   </span>
                                    <input id="thumbnail" class="form-control" type="text" value="{{$team->image}}" name="image">
                                    <img src="{{$team->image}}" style="height: 5rem;">
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
