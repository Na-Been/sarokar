@extends('frontend.layouts.app')
@section('title',getSubCategoryTitle($subCat) )
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
                </div></a>
            </section>
        @endif
    @endforeach
    <section class="category pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="news-block">
                        <div class="block-header">
                            <h3><b> {{$subCat->sub_category_name??''}}</b></h3>

                        </div>
                        {{--@if($value->news->id==$value->category->highlight_news_id)
                            <div class="news-image">
                                <img
                                    src="{{$value->news->feature_image??getDefaultImage()}}"
                                    alt=""/>
                            </div>
                            <div class="news-body pt-4">
                                <h4 class="news-title">
                                    {!!($value->news->title)!!}
                                </h4>
                                <br>
                                <p class="news-description">
                                    {!!($value->news->description)!!}
                                </p>
                            </div>
                        @endif--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12 k-c">
                            <div class="block">
                                <div class="block-body">
                                    <div class="row">
                                        @forelse($newsList as $key=>$value)
                                            @if($value->news->id!=$value->category->highlight_news_id)
                                                <div class="col-md-4">
                                                    <div class="news-block">
                                                        <div class="news-image">
                                                            <img
                                                                src="{{$value->news->feature_image??getDefaultImage()}}"
                                                                alt=""/>
                                                        </div>
                                                        <div class="news-body">
                                                            <a href="{{route('news-detail',$value->news->slug)}}">
                                                                <h4 class="news-title-1">
                                                                    {!!($value->news->title)!!}
                                                                </h4>
                                                            </a>
                                                            <div
                                                                class="news-date"><b>{{$value->news->posted_by}} | </b>
                                                                | {!! $value->news->getNepaliCreatedAt() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        @empty
                                            <p>No record found.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="position: relative;">
                    <div class="block" style="position: sticky; top: 0px;">
                        <div class="block-header">
                            <h3><b>भर्खरै</b></h3>
                        </div>
                        <div class="block-body">
                            @forelse(getLatestFiveNews() as $key=>$value)
                                <div class="news-block">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="news-image">
                                                <img
                                                    src="{{$value->feature_image??getDefaultImage()}}"
                                                    alt=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <a href="{{route('news-detail',$value->slug)}}">

                                                <h4 class="news-title-1 m-0">
                                                    {!! $value->title??''!!}

                                                </h4>
                                            </a>
                                            <div class="news-date pt-1"><b>{{$value->posted_by}} |</b>
                                                {!! $value->getNepaliCreatedAt()??'' !!}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                </div>
                            @empty
                                <p>No latest News Found !!</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
