@extends('frontend.layouts.app')
<style>
    .vdo_pagi nav{
        display:flex !important;
        justify-content:space-between !important;
        
    }
       .vdo_pagi nav svg{
           width:15px !important;
       }
         .vdo_pagi nav div:nth-child(1) {
             display:none !important;
         }
           .vdo_pagi nav div:nth-child(1) a{
             display:none !important;
         }
      
</style>
@section('title',getSetting('site_title').' - '.'Videos')
@section('content')
    @foreach($ads as $ad)
        @if($ad->rank == 1)
            <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                    <div class="container">
                        <img
                            width="100%"
                            src="{{$ad->image}}"
                            alt=""
                        />
                    </div>
                </a>
            </section>
        @endif
    @endforeach
        <section class="category pt-5">
            <div class="container">
                <div class="col-md-12 k-c">
                    <div class="block">
                        <div class="block-body">
                            <div class="row">
                                @forelse($videos as $video)
                                    <div class="col-md-4">
                                        <div class="news-block">

                                            <a href="{{$video->url}}" target="_blank">
                                                <div class="news-image">
                                                    {!! $video->video_html !!}

                                                </div>

                                                <div class="news-body ">

                                                    <h4 class="news-title-1 mt-3">
                                                        {{$video->title}}
                                                    </h4>

                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <p>No record found.</p>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
                <div class="vdo_pagi"> {!! $videos->links() !!}</div>
            </div>
        </section>
   
@endsection
