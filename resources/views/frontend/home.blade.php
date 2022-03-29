@extends('frontend.layouts.app')
@section('title',getSetting('site_title').' | '.'Home')
@section('content')
    @forelse($ads as $ad)
        @if($ad->rank == 2)
            <section class="ads py-3">
                <a href="{{$ad->url}}" title="{{$ad->title}}">
                    <div class="container">
                        <img width="100%" src="{{$ad->image}}" alt=""/>
                    </div>
                </a>
            </section>
        @endif
    @empty
    @endforelse
    <!-- flash-news -->
    <section>
        <div>
            <section class="highlight-news py-5">
                <div class="container">
                    @forelse(getFlashNews() as $flashNews)
                        <div class="highlight-news-top">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('news-detail',$flashNews->slug)}}">
                                        <h6 class="post-title text-center mb-4">
                                            <span class="highlight-text"><b>{{$flashNews->highlight_text}}</b></span>
                                        </h6>

                                        <div class="news-block">
                                            <h1 class="news-title text-center" style="font-size: 48px">
                                                <b>{{$flashNews->title}}</b>
                                            </h1>
                                            <div class="news-author text-center py-4">
                                                <div class="highlight-author-img">
                                                    <img src="{{$flashNews->author_image}}" alt="">
                                                </div>
                                                <span><b>{{$flashNews->posted_by}}</b></span>
                                            </div>
                                            <div class="block_image">
                                                <img width="100%"
                                                     src="{{$flashNews->feature_image}}"
                                                     alt=""/>
                                                <div class="news-description mt-3 text-center">
                                                    @php  $description = preg_replace("/<img[^>]+\>/i", "(फोटो) ", $flashNews->description);@endphp
                                                    {!! (\Illuminate\Support\Str::words($description, 45 , '...')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                    @empty
                    @endforelse
                </div>
            </section>

            @forelse($ads as $ad)
                @if($ad->rank == 3)
                    <section class="ads py-3"><a href="{{$ad->url}}" title="{{$ad->title}}">
                            <div class="container">
                                <img width="100%" src="{{$ad->image}}" alt=""/>
                            </div>
                        </a>
                    </section>
                @endif
            @empty
                <h1></h1>
            @endforelse

        <!-- first-block-news -->


            @if(getFirstCategoryData()->count() > 0 || getSecondCategoryData()->count() > 0)

                @include('frontend.news-block.first-block')

            @else
                <section class="ads py-3">
                    <div class="container">
                        <p>
                            No Record Found in First Row
                        </p>
                    </div>
                </section>
            @endif


        <!-- second-block-news -->

            @if(getFourthCategoryData()->count()>0 || getFifthCategoryData()->count() > 0)
                @include('frontend.news-block.second-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <p>
                            No Record Found in Second Row
                        </p>
                    </div>
                </section>
            @endif


        <!-- third-block-news -->

            @if(getSixthCategoryData()->count() >0 || getSeventhCategoryData()->count()>0)
                @include('frontend.news-block.third-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No Record Found in Third Row
                        </b>
                    </div>
                </section>
            @endif

        <!-- fourth-block-news -->

            @if(getEighthCategoryData()->count() > 0 || getNinthCategoryData()->count() > 0)
                @include('frontend.news-block.fourth-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No Record Found in Fourth Row
                        </b>
                    </div>
                </section>
            @endif

        <!-- fifth-block-news -->

            @if(getTenthCategoryData()->count()>0 || getEleventhCategory()->count() > 0)
                @include('frontend.news-block.fifth-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No Record Found in Fifth Row
                        </b>
                    </div>
                </section>
            @endif


        <!-- sixth-block-news -->

            @if(getPhotoFeature()->count()>0)
                @include('frontend.news-block.sixth-block')
            @else
                <section class="ads py-3">
                    <div class="container">
                        <b>
                            No ninth category
                        </b>
                    </div>
                </section>
        @endif



        <!-- seventh-block-news -->

        @if(getTwelfthCategory()->count()>0 || getThirteenCategory()->count()>0)
            @include('frontend.news-block.seventh-block')
        @else
        @endif

        <!-- eighth-block-news -->

        @if(getVideoSection()->count() > 0)
            @include('frontend.news-block.eighth-block')
        @else
        @endif

        <!-- ninth-block-news -->

    @if(getFourteenCategory()->count()>0 || getFifteenCategory()->count()>0)
        @include('frontend.news-block.ninth-block')
    @else
    @endif

@endsection
