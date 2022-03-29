@extends('frontend.layouts.app')
@section('title',getCategoryTitle($newsList->first()) )

@section('content')
    @forelse($ads as $ad)
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
    @empty
    @endforelse


    <section class="category pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="news-block">
                        <div class="block-header">
                            <h3><b>{{$newsList->first()->category->title??''}}</b></h3>
                        </div>
                        @forelse($newsList as $key=>$value )
                            @if($value->news->id == $value->category->highlight_news_id)
                                <a href="{{route('news-detail',$value->news->slug)}}">
                                    <div class="news-image">
                                        <img
                                            src="{{$value->news->feature_image}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="news-body pt-4">
                                        <p class="news-description">
                                            {!! Str::limit($value->news->description, 400) !!}
                                        </p>
                                    </div>
                                </a>
                            @elseif($loop->first)
                                <a href="{{route('news-detail',$value->news->slug)}}">
                                    <div class="news-image">
                                        <img
                                            src="{{$value->news->feature_image}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="news-body pt-4">
                                        <div class="news-description">
                                            {!! Str::limit($value->news->description, 400) !!}
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @empty
                        @endforelse
                    </div>


                    <div class="row">
                        <div class="col-md-12 k-c">
                            <div class="block">
                                <div class="block-body">
                                    <div class="row">
                                        @forelse($newsList as $key=>$value)
                                            @if($loop->iteration >1 )
                                                <div class="col-md-4">
                                                    <div class="news-block">
                                                        <a href="{{route('news-detail',$value->news->slug)}}">
                                                            <div class="news-image news-image-fixed3">
                                                                <img
                                                                    src="{{$value->news->feature_image}}"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="news-body">
                                                                <h4 class="news-title-1">
                                                                    {{$value->news->title}}
                                                                </h4>
                                                                <div class="news-date">{{$value->news->posted_by}}
                                                                    | {!! $value->news->getNepaliCreatedAt() !!}</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!!  $newsList->links() !!}
                    </div>
                </div>
                <div class="col-md-4" style="position: relative;">
                    <div class="block" style="position: sticky; top: 0px;">
                        <div class="block-header">
                            <h3><b>ताजा अपडेट</b></h3>
                        </div>
                        <div class="block-body">
                            @forelse(getLatestFiveNews() as $key=>$value)
                                <div class="news-block">
                                    <a href="{{route('news-detail',$value->slug)}}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="news-image news-image-fixed">
                                                    <img src="{{$value->feature_image}}" alt=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h4 class="news-title-1 m-0">
                                                    {{$value->title}}
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
