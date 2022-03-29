@extends('backend.layouts.app')
@section('title','Edit News')
@section('content')
<style>
    a#lfm3 {
    animation: auto;
    background: #cdcbcb;
    padding: 7px;
    margin-top: 9px;
    display: inline-block;
}

a#lfm {
     animation: auto;
    background: #cdcbcb;
    padding: 7px;
    margin-top: 9px;
     
}

.intro-y.col-span-12.sm\:col-span-3.p-2 {
    background: ghostwhite;
    border: solid 1px #eee;
}
</style>
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit News
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('news.index')}}" class="button text-white bg-theme-1 shadow-md mr-2">Back</a>
            </div>
        </div>
        <div class="col-span-12">
            {!! Form::model($news,['method'=>'PUT','route'=>['news.update',$news->id], 'enctype'=>'multipart/form-data']) !!}
            <div class="col-span-12 lg:col-span-6">
                <div class="box">
                    <div class="grid grid-cols-12 mt-5">
                        <div
                            class="intro-y col-span-12 sm:col-span-7  p-5">
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-5 {{($errors->has('title   ')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">Title <span class="text-theme-6">*</span></div>
                                {!! Form::text('title',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter News Title']) !!}
                                {!! $errors->first('title', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-5 {{($errors->has('status')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Status</div>
                                {!! Form::select('status', ['1' => 'Published', '0' => 'Inactive'], '1', ['class' => 'input w-full border flex-1']) !!}
                                {!! $errors->first('status', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-5 {{($errors->has('image')) ? 'has-error':''}}">
                                <div class="font-medium">
                                    <label for="image_label font-medium"> Feature Image</label>
                                </div>
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" style="cursor: pointer!important;" data-input="thumbnail1"
                                        data-preview="holder" class="btn btn-primary">
                                     @if($news->feature_image)
                                             <i class="fas fa-image"></i> Change Feature Image</a>
                                   </span>
                                    <input id="thumbnail1" class="form-control" type="text"
                                           value="{{$news->feature_image}}" name="feature_image">
                                    <img src="{{asset($news->feature_image)}}" style="height: 5rem;">
                                    @else
                                        <i class="fas fa-image"></i> Choose Feature Image</a>
                                        </span>
                                        <input id="thumbnail1" class="form-control" type="text" name="feature_image">
                                    @endif
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                {!! $errors->first('image', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-5 {{($errors->has('image')) ? 'has-error':''}}">
                                <div class="font-medium">
                                    <label for="image_label">Author Image</label>
                                </div>
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm3" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary"
                                        style="cursor: pointer">
                                      @if($news->author_image)
                                             <i class="fas fa-image"></i> Change Author Image</a>
                                   </span>
                                    <input id="thumbnail2" class="form-control" type="text" name="author_image"
                                           value="{{$news->author_image}}">
                                    <img src="{{asset($news->author_image)}}" style="height: 5rem;">
                                    @else
                                        <i class="fas fa-image"></i> Choose Author Image</a>
                                        </span>
                                        <input id="thumbnail2" class="form-control" type="text" name="author_image">
                                    @endif
                                </div>
                                <div id="holder2" style="margin-top:15px;max-height:100px;">
                                </div>
                                {!! $errors->first('image', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-5 {{($errors->has('posted_by')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">Author Name<span class="text-theme-6">*</span></div>
                                {!! Form::text('posted_by',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter News Title']) !!}
                                {!! $errors->first('posted_by', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-5 {{($errors->has('author_image')) ? 'has-error':''}}">
                                <div class="mb-2 font-medium">Flash News</div>
                                @if($news->flash_news == 1)
                                    <input class="input input--switch border user-status" type="checkbox" name="flash_news" checked>
                                @else
                                <input class="input input--switch border user-status" type="checkbox" name="flash_news">
                                @endif
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7 p-5 {{($errors->has('highlight_text')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">Highlight Text<span class="text-theme-6">*</span></div>
                                {!! Form::text('highlight_text',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter News Title']) !!}
                                {!! $errors->first('highlight_text', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-5 {{($errors->has('sub_heading')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">Sub Heading<span class="text-theme-6">*</span></div>
                                {!! Form::text('sub_heading',null,['class' => 'input w-full border flex-1','placeholder'=>'Enter News Title']) !!}
                                {!! $errors->first('sub_heading', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            <div
                                class="intro-y col-span-12 sm:col-span-7  p-5 {{($errors->has('sub_heading')) ? 'has-error':''}} ">
                                <div class="" id="standard-editor">
                                    <div class="mb-2 font-medium">Description<span class="text-theme-6">*</span></div>
                                    {!! Form::textarea('description',null,['id'=>'ck-editor','placeholder' => 'News Description']) !!}
                                </div>

                            </div>
                         
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-5 p-5">
                            <div
                                class="intro-y col-span-12 sm:col-span-6  p-5 {{($errors->has('category_id')) ? 'has-error':''}} ">
                                <div class="mb-2 font-medium">Select Category & Sub Category <span class="text-theme-6">*</span>
                                </div>
                                @forelse($cats as $cat)
                                    @if(checkNewsCategory($news->id, $cat->id))
                                        {!! Form::checkbox('category_id[]',$cat->id,true,['class' => 'input w-full border flex-1','id'=>$cat->slug,'placeholder'=>'-- Choose Category --']) !!}
                                    @else
                                        {!! Form::checkbox('category_id[]',$cat->id, null, ['class' => 'input w-full border flex-1','id'=>$cat->slug,'placeholder'=>'-- Choose Category --']) !!}
                                    @endif
                                    {{--                                {!! Form::label($cat->title) !!}--}}
                                    {{$cat->title}}
                                    <br/>
                                    <div class="intro-y col-span-12 sm:col-span-6  p-3">
                                        @foreach($cat->getSubCategories($cat->id) as $sub)
                                            @if(checkNewsSubCategory($news->id, $sub->id))
                                                {!! Form::checkbox('sub_category_id[]',$sub->id,true,['class' => 'input w-full border flex-1','id'=>$sub->slug,'placeholder'=>'-- Choose Category --']) !!}
                                            @else
                                                {!! Form::checkbox('sub_category_id[]',$sub->id, null, ['class' => 'input w-full border flex-1','id'=>$sub->slug,'placeholder'=>'-- Choose Category --']) !!}
                                            @endif
                                            {{--                                        {!! Form::label($sub->sub_category_name) !!}--}}
                                            {{$sub->sub_category_name}}
                                            <br/>
                                        @endforeach
                                    </div>

                                @empty
                                    <h1>No category Available.</h1>
                                @endforelse
                                {!! $errors->first('category_id', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            </div>
                            {!! $errors->first('category_id', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
                            {!! $errors->first('sub_category_id', '<div class="pristine-error text-theme-6 mt-2">:message</div>') !!}
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
    
    
 <script
        src="https://cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
    <script>
        var options = {
            extraPlugins: 'embed,autoembed,image2',
            height: 200,
            filebrowserImageBrowseUrl: "{{url('/')}}" + '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: "{{url('/')}}" + '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: "{{url('/')}}" + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: "{{url('/')}}" + '/laravel-filemanager/upload?type=Files&_token=',
            embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
            image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
            image2_disableResizer: true,
        };
    </script>
 <script type="text/javascript">
    CKEDITOR.replace('ck-editor', {
            extraPlugins: 'embed,autoembed,image2',
            filebrowserImageBrowseUrl: "{{url('/')}}" + '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: "{{url('/')}}" + '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: "{{url('/')}}" + '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: "{{url('/')}}" + '/laravel-filemanager/upload?type=Files&_token=',
            embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
            image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
            image2_disableResizer: true,
       
    });
</script>

@endsection

