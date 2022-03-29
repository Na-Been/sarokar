<section class="अर्थ-विजनेस">
    <div class="container">
        <div class="row ">
            <div class="col-md-9 k-c">
                <div class="block">
                    @if(getTenthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getTenthCategoryData()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getTenthCategoryData()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        <div class="row">
                            @forelse(getTenthCategoryData() as $key=>$value)
                                @if($loop->iteration > 0 && $loop->iteration < 7)
                                    <div class="col-md-4">
                                        <a href="{{route('news-detail',$value->news->slug)}}">
                                            <div class="news-block">
                                                <div class="news-image news-image-fixed3">
                                                    <img src="{{$value->news->feature_image}}"
                                                         alt=""/>
                                                </div>
                                                <div class="news-body">
                                                    <h4 class="news-title-1">
                                                        {{$value->news->title}}
                                                    </h4>
                                                    <div
                                                        class="news-date">{{$value->news->posted_by}}
                                                        | {!! $value->news->getNepaliCreatedAt() !!}
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

            <!-- साहित्य -->
            <div class="col-md-3">
                <div class="block">
                    @if(getEleventhCategory()->count() >0)
                        <div class="block-header">
                            <h3><b>{{getEleventhCategory()->first()->category->title}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getEleventhCategory()->first()->category->slug)}}">
                                    सबै: <i class="fas fa-chevron-right"></i></a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @if(getEleventhCategory()->first())
                            <div class="news-block">
                                <a href="{{route('news-detail',getEleventhCategory()->first()->news->slug)}}">
                                    <div class="news-image news-image-fixed3">
                                        <img
                                            src="{{getEleventhCategory()->first()->news->feature_image}}"
                                            alt=""/>
                                    </div>
                                    <h4 class="news-title-1">
                                        {{getEleventhCategory()->first()->news->title}}
                                    </h4>
                                    <div class="news-date">{{getEleventhCategory()->first()->news->posted_by}}
                                        | {!! getEleventhCategory()->first()->news->getNepaliCreatedAt() !!}
                                    </div>
                                </a>
                            </div>
                        @endif

                        @forelse(getEleventhCategory() as $key=>$value)
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
                                                <div class="news-date pt-1">{{$value->news->posted_by}}
                                                    | {!! $value->news->getNepaliCreatedAt() !!}</div>
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


