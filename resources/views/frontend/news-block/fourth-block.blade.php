<section class="कला शैली">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="block">
                    @if(getEighthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getEighthCategoryData()->first()->category->title}}</b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getEighthCategoryData()->first()->category->slug)}}">
                                    सबै
                                    हेर्नुहोस्
                                    <i class="fas fa-chevron-right"></i> </a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getEighthCategoryData()->first())
                                <div class="col-md-6">
                                    <div class="news-block ">
                                        <a href="{{route('news-detail',getEighthCategoryData()->first()->news->slug)}}">
                                            <div class="news-image overlay-1">
                                                <img src="{{getEighthCategoryData()->first()->news->feature_image}}"
                                                     alt=""/>
                                                <div class="overlay-title">
                                                    <h4 class="news-title">
                                                        {{getEighthCategoryData()->first()->news->title}}
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="news-body  pt-4">
                                                <div
                                                    class="news-date">{{getEighthCategoryData()->first()->news->posted_by}}

                                                    | {!! getEighthCategoryData()->first()->news->getNepaliCreatedAt() !!}</div>
                                                <p class="news-description">

                                                    {!! Str::limit(getEighthCategoryData()->first()->news->description,300) !!}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="row">
                                    @forelse(getEighthCategoryData() as $key=>$value)
                                        @if($loop->iteration > 1 && $loop->iteration < 6)
                                            <div class="col-md-6">
                                                <div class="news-block">
                                                    <div class="news-image">
                                                        <img src="{{$value->news->feature_image}}" alt="">
                                                    </div>
                                                    <h4 class="news-title-1">
                                                        {{$value->news->title}}
                                                    </h4>
                                                    <div class="news-date">{{$value->news->posted_by}}
                                                        | {!! $value->news->getNepaliCreatedAt() !!}</div>
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
            </div>
            <div class="col-md-3">
                <div class="block">
                    @if(getNinthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getNinthCategoryData()->first()->category->title}}</b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getNinthCategoryData()->first()->category->slug)}}">
                                    सबै: </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @if(getNinthCategoryData()->first())
                            <div class="news-block ">
                                <a href="{{route('news-detail',getNinthCategoryData()->first()->news->slug)}}">
                                    <div class="news-image">
                                        <img src="{{getNinthCategoryData()->first()->news->feature_image}}">
                                    </div>
                                </a>
                                <div class="news-body mb-3">
                                    <h1 class="news-title-1 m-0 mt-2">
                                        {{getNinthCategoryData()->first()->news->title}}
                                    </h1>
                                    <div class="news-date"><b>{{getNinthCategoryData()->first()->news->posted_by}}
                                            | </b>
                                        {!! getNinthCategoryData()->first()->news->getNepaliCreatedAt() !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @forelse(getNinthCategoryData() as $key=>$value)
                        @if($loop->iteration > 1 && $loop->iteration < 4)
                            <div class="news-block">
                                <a
                                    href="{{route('news-detail',$value->first()->news->slug)}}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="news-image">
                                                <img src="{{$value->news->image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h4 class="news-title-1 m-0">
                                                {{$value->news->title}}
                                            </h4>
                                            <div class="news-date pt-1"><b>{{$value->news->posted_by}} | </b>
                                                {!! $value->news->getNepaliCreatedAt() !!}
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
</section>

