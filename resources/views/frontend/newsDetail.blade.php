@extends('frontend.layouts.app')
@section('title',getSetting('site_title').' - '.$news->title)
@section('content')

    <section class="news-detail pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="news-block">
                        <h6 class="post-title mb-4">
               @if($news->highlight_text ) <span class="highlight-text"><b>{{ $news->highlight_text }} </b>
               @else
               <span></span>
               @endif
                </span>
                        </h6>
                        <h1 class="news-detaul-title">
                            {{$news->title}}
                        </h1>

                        <div class="details pt-1 mb-3">
                            <div class="news-date">प्रकाशित मिति: {!! $news->getNepaliCreatedAt() !!}

                            </div>
                        
                            <div class="social-share">
                               <div class="addthis_inline_share_toolbox_j9k1"></div>
                            </div>
                        </div>


                        <div class="news-image">
                            <img src="{{$news->feature_image}}"
                                 alt=""/>
                        </div>

                        <div class="news-body pt-4">
                            <div class="news-description">
                                {!! $news->description !!}
                            </div>

                            <div class="author" style="color: #ba2c2c">{{$news->posted_by}}</div>
                        </div>
                        <div class="details pt-1">
                            <div class="news-date">प्रकाशित मिति: {!! $news->getNepaliCreatedAt() !!}

                            </div>
                        
                            <div class="social-share">
                                                <div class="addthis_inline_share_toolbox_j9k1"></div>
                            </div>
                        </div>
                        <div class="news-comments">
                          <div id="disqus_thread"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="position:relative">
                    <div class="block" style="position:sticky;top:50px">
                        <div class="block-header">
                            <h3><b>ताजा अपडेट</b></h3>
                        </div>
                        <div class="block-body">
                            @forelse(getLatestFiveNews() as $news)
                                <div class="news-block">

                                        <a href="{{route('news-detail',$news->slug)}}">
                                               <div class="row">
                                            <div class="col-md-4">
                                                <div class="news-image news-image-fixed">
                                                    <img src="{{$news->feature_image}}" alt=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h4 class="news-title-1 m-0">
                                                    {{$news->title}}
                                                </h4>
                                            </div>
                                              </div>
                                        </a>

                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    @forelse($ads as $ad)
                        @if($ad->rank == 4)
                            <section class="ads py-3">
                                <a href="{{$ad->url}}" title="{{$ad->title}}">
                                    <img width="100%" src="{{$ad->image}}" alt=""/>
                                </a>
                            </section>
                        @endif
                        @if($ad->rank == 5)
                            <section class="ads py-3">
                                <a href="{{$ad->url}}" title="{{$ad->title}}">
                                    <img width="100%" src="{{$ad->image}}" alt=""/>
                                </a>
                            </section>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
            @forelse($ads as $ad)
                @if($ad->rank == 6)
                    <section class="ads py-3">
                        <a href="{{$ad->url}}" title="{{$ad->title}}">
                            <img width="100%"
                                 src="{{$ad->image}}"
                                 alt=""/>
                        </a>
                    </section>
                @endif
            @empty
            @endforelse


            <div class="row">
                <div class="col-md-12 k-c">
                    <div class="block">
                        <div class="block-header">
                            <h3><b> सम्बन्धित समाचार </b></h3>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                @forelse(getAllNews()->take(6) as $news)
                                    <div class="col-md-4">
                                        <div class="news-block">
                                            <a href="{{route('news-detail',$news->slug)}}">
                                                <div class="news-image" style="height:240px">
                                                    <img style="height:100%;width:100%;object-fit:contain "
                                                        src="{{$news->feature_image}}">
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title-1">
                                                        {{$news->title}}
                                                    </h4>
                                                    <div class="news-date">{{$news->posted_by}}
                                                        | {!! $news->getNepaliCreatedAt() !!}</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
