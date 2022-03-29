<section class="photo-feature py-5">
    <div class="container">
        <div class="block-header" style="background: none  !important;">
            <h3 class="text-white"><b>फोटो फिचर</b></h3>

        </div>
        <div class=" row ">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="carousel-indicators" style="position: relative !important;">
                                <div class="row">
                                    @forelse(getNinthCategoryData() as $key=>$value)
                                        @if($loop->iteration > 0 && $loop->iteration < 4)
                                            <div type="button" data-bs-target="#carouselExampleCaptions"
                                                 data-bs-slide-to="0" class="active"
                                                 aria-current="true" aria-label="Slide 1">
                                                <a href="{{route('news-detail',$value->news->slug)}}">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img
                                                                src="{{$value->news->feature_image}}"
                                                                alt="">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4 class="news-title-photo text-white m-0">
                                                                {{$value->news->title}}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
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
                                @forelse(getNinthCategoryData() as $key=>$value)
                                    @if($loop->iteration > 0 && $loop->iteration < 4)
                                        <div class="carousel-item {{$loop->iteration == 1 ? 'active':' '}} ">
                                            <a href="{{route('news-detail',$value->news->slug)}}">
                                                <div class="slider-overlay"></div>
                                                <img
                                                    src="{{$value->news->feature_image}}"
                                                    class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5 class="news-title text-white">{{$value->news->title}}</h5>
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
        </div>
    </div>
</section>
