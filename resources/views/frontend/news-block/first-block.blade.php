<section class="chitwan-bses">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="block">

                    @if(getFirstCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFirstCategoryData()->first()->category->title??''}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFirstCategoryData()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                    @endif
                    <div class="block-body">

                        @forelse(getFirstCategoryData() as $key=>$value)
                        @if($loop->iteration > 0 && $loop->iteration < 4)

                            <div class="news-block">

                                    <a href="{{route('news-detail',$value->news->slug)}}">
                                          <div class="row">
                                        <div class="col-md-4">
                                            <div class="news-image">
                                                <img src="{{$value->news->feature_image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h4 class="news-title-1 m-0">
                                                {{$value->news->title}}
                                            </h4>
                                            <div class="news-date pt-1">{{$value->news->posted_by}}
                                                | {!! $value->news->getNepaliCreatedAt()??'' !!}</div>
                                        </div>
                                         </div>
                                    </a>

                            </div>
                            @endif
                        @empty
                        @endforelse

                        @forelse($ads as $ad)
                            @if($ad->rank == 4)
                             
                                    <a href="{{$ad->url}}" title="{{$ad->title}}">
                                        <div class="row">
                                            <img style="width:100%" src="{{$ad->image}}" alt="">
                                        </div>
                                    </a>
                               
                            @endif
                        @empty
                        @endforelse
                    </div>
                </div>

            </div>
            @if(getSecondCategoryData()->count() > 0)
                <div class="col-md-6">
                    <div class="block ">
                        <div class="block-header">
                            <h3><b>{{getSecondCategoryData()->first()->category->title??' '}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getSecondCategoryData()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                        <div class="block-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="news-block ">
                                        <a href="{{route('news-detail',getSecondCategoryData()->first()->news->slug) ?? ' '}}">
                                            <div class="news-image">
                                                <img
                                                    src="{{getSecondCategoryData()->first()->news->feature_image ?? ' '}}"
                                                    alt=""/>
                                            </div>
                                            <div class="news-body">
                                                <h4 class="news-title">
                                                    {{getSecondCategoryData()->first()->news->title ?? ' '}}
                                                </h4>
                                                <div
                                                    class="news-date">{{getSecondCategoryData()->first()->news->posted_by}}

                                                    | {!! getSecondCategoryData()->first()->news->getNepaliCreatedAt() !!}</div>
                                                <div class="news-description">
                                                    {!! Str::limit(getSecondCategoryData()->first()->news->description, 300) !!}
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-3">
                <div class="block px-4" style="background: #f5f3f3;">
                    @if(getThirdCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getThirdCategoryData()->first()->category->title??''}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getThirdCategoryData()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @forelse(getThirdCategoryData()->take(5) as $key=>$value)
                            <div class="news-block">
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <div class="news-image">
                                            <img
                                                src="{{$value->news->feature_image}}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 class="news-title-1 m-0">
                                            {{$value->news->title}}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>









<style>
    .carousel-item{
        height:500px;
    }
    .carousel-item>a>iframe{
        height:100% !important;
        width:100% !important;
    }
    .c-item>iframe{
        height:100% !important;
        width:100% !important;
    }
</style>



