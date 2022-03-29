<section class="खेलकुद">
    <div class="container">
        <div class="row ">
            <div class="col-md-9">
                <div class="block">
                    @if(getTwelfthCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getTwelfthCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all">
                                <a
                                    href="{{route('category-slug',getTwelfthCategory()->first()->category->slug)}}">
                                    सबै: </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getTwelfthCategory()->first())
                                <div class="col-md-6">
                                    <div class="news-block">
                                        <a href="{{route('news-detail',getTwelfthCategory()->first()->news->slug)}}">
                                            <div class="news-image">
                                                <img src="{{getTwelfthCategory()->first()->news->feature_image}}">

                                            </div>
                                            <div class="news-body">
                                                <h4 class="news-title">
                                                    {{getTwelfthCategory()->first()->news->title}}
                                                </h4>
                                                <div class="news-date">
                                                    <b> {{getTwelfthCategory()->first()->news->posted_by}}</b>
                                                    {!!  getTwelfthCategory()->first()->news->getNepaliCreatedAt() !!}
                                                </div>
                                                <div class="news-description">
                                               {!! Str::limit(getTwelfthCategory()->first()->news->description,300) !!}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                @forelse(getTwelfthCategory() as $key=>$value)
                                    @if($loop->iteration > 1 && $loop->iteration < 6)
                                        <div class="news-block">
                                            <a href="{{route('news-detail',$value->news->slug)}}">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="news-image">
                                                            <img
                                                                src="{{$value->news->feature_image}}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h4 class="news-title-1 m-0">
                                                            {{$value->news->title}}
                                                        </h4>
                                                        <div class="news-date pt-1"><b>{{$value->news->posted_by}}
                                                                | </b>{!! $value->news->getNepaliCreatedAt() !!}

                                                        </div>
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
                </div>
            </div>

            <!-- स्वास्थ्य -->
            <div class="col-md-3">
                <div class="block">
                    @if(getThirteenCategory()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getThirteenCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getThirteenCategory()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @if(getThirteenCategory()->first())
                            <div class="news-block">
                                <a href="{{route('news-detail',getThirteenCategory()->first()->news->slug)}}">
                                    <div class="news-image">
                                        <img
                                            src="{{getThirteenCategory()->first()->news->feature_image}}"
                                            alt=""/>
                                    </div>
                                    <h4 class="news-title-1">
                                        {{getThirteenCategory()->first()->news->title}}
                                    </h4>
                                    <div class="news-date">{{getThirteenCategory()->first()->news->posted_by}}
                                        | {!! getThirteenCategory()->first()->news->getNepaliCreatedAt() !!}
                                    </div>
                                </a>
                            </div>
                        @endif
                        @forelse(getThirteenCategory() as $key=>$value)
                            @if($loop->iteration > 1 && $loop->iteration < 4)
                                <div class="news-block">
                                    <div class="row">
                                        <a href="{{route('news-detail',$value->news->slug)}}">
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
                                                <div class="news-date pt-1">{{$value->news->posted_by}}
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
    </div>
</section>
