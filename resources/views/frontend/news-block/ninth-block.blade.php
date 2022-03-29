<section class="रोचक संसार ">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="block">
                    @if(getFourteenCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFourteenCategory()->first()->category->title ?? ''}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFourteenCategory()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getFourteenCategory()->first())
                                <div class="col-md-6">
                                    <div class="news-block">
                                        <a href="{{route('news-detail',getFourteenCategory()->first()->news->slug)}}">
                                            <div class="news-image">
                                                <img
                                                    src="{{getFourteenCategory()->first()->news->feature_image}}"
                                                    alt=""/>
                                            </div>
                                            <div class="news-body">
                                                <h4 class="news-title">
                                                    {{getFourteenCategory()->first()->news->title}}
                                                </h4>
                                                <div
                                                    class="news-date">{{getFourteenCategory()->first()->news->posted_by}}

                                                    | {!! getFourteenCategory()->first()->news->getNepaliCreatedAt() !!}</div>
                                                <p class="news-description">

                                                    {!! Str::limit(getFourteenCategory()->first()->news->description,150) !!}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-3">
                                @forelse(getFourteenCategory() as $key=>$value)
                                    @if($loop->iteration > 1 && $loop->iteration < 4)
                                        <div class="news-block ">
                                            <a href="{{route('news-detail',$value->news->slug)}}">
                                                <div class="news-image">
                                                    <img
                                                        src="{{$value->news->feature_image}}"
                                                        alt="">
                                                </div>
                                                <div class="news-body">
                                                    <p class="news-title-1">{{$value->news->title}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                            <div class="col-md-3">
                                @forelse(getFourteenCategory() as $key=>$value)
                                    @if($loop->iteration > 3 && $loop->iteration < 6)
                                        <div class="news-block ">
                                            <a href="{{route('news-detail',$value->news->slug)}}">
                                                <div class="news-image">
                                                    <img
                                                        src="{{$value->news->feature_image}}"
                                                        alt="">
                                                </div>
                                                <div class="news-body">
                                                    <p class=" news-title-1">{{$value->news->title}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @if(getFifteenCategory()->count() > 0)
                <div class="col-md-3">
                    <div class="block">
                        <div class="block-header">
                            <h3><b>{{getFifteenCategory()->first()->category->title ?? ''}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFifteenCategory()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                        <div class="block-body">
                            <div class="news-block">
                                <a href="{{route('news-detail',getFifteenCategory()->first()->news->slug)}}">
                                    <div class="news-image">
                                        <img
                                            src="{{getFifteenCategory()->first()->news->feature_image}}"
                                            alt=""/>
                                    </div>
                                    <div class="news-body">
                                        <h1 class="news-subtitle">{{getFifteenCategory()->first()->news->highlight_text}}</h1>
                                        <h1 class="news-title-1">
                                            {{getFifteenCategory()->first()->news->title}}
                                        </h1>
                                        <div class="news-date"> {{getFifteenCategory()->first()->news->posted_by}}
                                            | {!!  getFifteenCategory()->first()->news->getNepaliCreatedAt() !!}</div>
                                    </div>
                                </a>
                            </div>

                            @forelse(getFifteenCategory() as $key=>$value)
                                @if($loop->iteration > 1 && $loop->iteration < 4)
                                    <div class="news-block">
                                        <a href="{{route('news-detail',$value->news->slug)}}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="news-image">
                                                        <img
                                                            src="{{$value->news->feature_image}}"
                                                            alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="news-title-1 m-0">
                                                        {{$value->news->title}}
                                                    </h4>
                                                    <div class="news-date pt-1"> {{$value->news->posted_by}}
                                                        | {!!  $value->news->getNepaliCreatedAt() !!}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
