<section class="राजनीति">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="block">
                    @if(getSixthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getSixthCategoryData()->first()->category->title}}</b></h3>
                            <h6 class="see-all">
                                <a
                                    href="{{route('category-slug',getSixthCategoryData()->first()->category->slug)}}">
                                    सबै: </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @if(getSixthCategoryData()->first())
                                <div class="col-md-8">
                                    <div class="news-block">
                                        <a href="{{route('news-detail',getSixthCategoryData()->first()->news->slug)}}">
                                            <div class="news-image">
                                                <img src="{{getSixthCategoryData()->first()->news->feature_image}}">
                                            </div>
                                            <div class="news-body">
                                                <h4 class="news-title">
                                                    {{getSixthCategoryData()->first()->news->title}}
                                                </h4>
                                                <div class="news-date">
                                                    <b>{{getSixthCategoryData()->first()->news->posted_by}}</b>
                                                    {!!  getSixthCategoryData()->first()->news->getNepaliCreatedAt() !!}
                                                </div>
                                                <div class="news-description">
                                                   
                                                        {!! Str::limit(getSixthCategoryData()->first()->news->description, 300) !!}
                                                  
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-4">
                                @forelse(getSixthCategoryData() as $key=>$value)
                                    @if($loop->iteration > 1 && $loop->iteration <4)
                                        <div class="news-block ">
                                            <a href="{{route('news-detail',$value->news->slug)}}">
                                                <div class="news-image news-image-fixed3">
                                                    <img
                                                        src="{{$value->news->feature_image}}">
                                                </div>
                                            </a>
                                            <div class="news-body mb-3">
                                                <h1 class="news-title-1 m-0 mt-2">
                                                    {{$value->news->title}}
                                                </h1>
                                                <div class="news-date"><b> {{$value->news->posted_by}} | </b>
                                                    {!! $value->news->getNepaliCreatedAt() !!}
                                                </div>
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

            <div class="col-md-3">
                <div class="block">
                    @if(getSeventhCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getSeventhCategoryData()->first()->category->title ??' '}}
                                </b></h3>
                            <h6 class="see-all">
                                <a href="{{route('category-slug',getSeventhCategoryData()->first()->category->slug)}}">
                                    सबै: </a>
                            </h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @if(getSeventhCategoryData()->first())
                            <div class="news-block ">
                                <a href="{{route('news-detail',getSeventhCategoryData()->first()->news->slug)}}">
                                    <div class="news-image">
                                        <img src="{{getSeventhCategoryData()->first()->news->feature_image}}">
                                    </div>
                                </a>
                                <div class="news-body mb-3">

                                    <h1 class="news-title-1 m-0 mt-2">
                                        {{getSeventhCategoryData()->first()->news->title}}
                                    </h1>
                                    <div class="news-date"><b> {{getSeventhCategoryData()->first()->news->posted_by}}
                                            | </b>
                                        {!! getSeventhCategoryData()->first()->news->getNepaliCreatedAt() !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @forelse(getSeventhCategoryData() as $key=>$value)
                            @if($loop->iteration > 1 && $loop->iteration < 5)
                                <div class="news-block">
                                    <a href="{{route('news-detail',$value->news->slug)}}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="news-image">
                                                    <img src="{{$value->news->feature_image}}"
                                                         alt="">
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
    </div>
</section>

