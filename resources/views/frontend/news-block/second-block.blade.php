<section class="समाज">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="block">
                    @if(getFourthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b> {{getFourthCategoryData()->first()->category->title ?? ' '}}</b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFourthCategoryData()->first()->category->slug)}}">
                                    सबै:</a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @forelse(getFourthCategoryData() as $key=>$value)
                            @if($loop->first)
                                <div class="row">
                                    <div class="news-block  po">
                                        <a href="{{route('news-detail',$value->news->slug)}}">
                                            <div class="row  sambad " style="position: relative;">
                                                <div class="col-md-8">
                                                    <div class="news-image">
                                                        <img
                                                            src="{{$value->news->feature_image}}"
                                                            alt=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="news-body" >
                                                        <h4 class="news-title text-white">
                                                            {{$value->news->title}}
                                                        </h4>
                                                        <div class="news-description text-white pt-4">
                                                            {!! Str::limit($value->news->description,70) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse

                        <div class="row ">
                            @forelse(getFourthCategoryData() as $key=>$value)
                                @if($loop->iteration >2 && $loop->iteration < 5)
                                    <div class="col-md-6">
                                        <div class="news-block">
                                            <a href="{{route('news-detail',$value->news->slug)}}">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="news-image">
                                                            <img
                                                                src="{{$value->news->feature_image}}"
                                                                alt=""/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h4 class="news-title-1 m-0">
                                                            {{$value->news->title}}
                                                        </h4>
                                                    </div>
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
            <!-- bichar -->
            <div class="col-md-3">
                <div class="block">
                    @if(getFifthCategoryData()->count() > 0)
                        <div class="block-header">
                            <h3><b>{{getFifthCategoryData()->first()->category->title}} </b></h3>
                            <h6 class="see-all"><a
                                    href="{{route('category-slug',getFifthCategoryData()->first()->category->slug)}}">
                                    सबै
                                    हेर्नुहोस् <i class="fas fa-chevron-right"></i></a></h6>
                        </div>
                    @endif
                    <div class="block-body">
                        @forelse(getFifthCategoryData() as $key=>$value)
                            @if($loop->iteration >=1 && $loop->iteration <=3)
                                <div class="news-block p-3 m-0 " style="border: 1px solid #ccc">
                                    <div class="row">
                                        <h4 class="news-title-1 mb-4 text-start">
                                            {{$value->news->title}}
                                        </h4>
                                        <div class="col-md-3">
                                            <div class="news-image news-image-rounded">
                                                <img
                                                    src="{{$value->news->feature_image}}"
                                                    alt=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-9 bichar-desc" style="">
                                            <h6 class="news-author ">{{$value->news->posted_by}}</h6>
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
</section>
