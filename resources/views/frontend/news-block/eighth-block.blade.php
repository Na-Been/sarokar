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

<section class="photo-feature py-5">
    <div class="container">
        <div class="block-header" style="background: none  !important;">
            <h3 class="text-white"><b>भिडियो</b></h3>


        </div>
        <div class=" row ">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="carousel-indicators" style="position: relative !important;">
                                <div class="row">
                                    @forelse(getVideoSection() as $key=>$value)
                                        <div type="button" data-bs-target="#carouselExampleCaptions"
                                             data-bs-slide-to="{{$key}}" class="active"
                                             aria-current="true" aria-label="Slide 1">
                                            <a href="{{$value->url}}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {!! $value->video_html !!}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4 class="news-title-photo text-white m-0">
                                                            {{$value->title}}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @if($loop->iteration > 0 && $loop->iteration < 3)
                                            <hr>
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="carousel-inner">
                                @forelse(getVideoSection() as $key=>$value)
                                    @if($loop->iteration > 0 && $loop->iteration < 3)
                                        <div class="carousel-item {{$loop->iteration == 1 ? 'active':' '}} ">
                                            <div class="slider-overlay"></div>
                                            {!! $value->video_html !!}
                                            <div class="carousel-caption d-none d-md-block">
                                                <a href="{{$value->url}}">
                                                    <h5 class="news-title text-white">{{$value->title}}</h5>
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
        </div>
    </div>
</section>

