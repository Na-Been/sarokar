<!-- navbar -->
<header>
    <div class="header_top p-3 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="logo ">
                        <a href="{{url('/')}}">
                            @if(getSetting('logo'))
                                <img src="{{getSetting('logo')}}" alt="Site Logo"/>
                            @else
                                <img
                                    src="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img/https://sarokaronline.com/wp-content/uploads/2019/12/sarokaronline-final.png"
                                    alt=""/>
                            @endif
                        </a>
                        <div class="header-date ">
                            <i class="far fa-calendar-alt" style="color: #1a427a"></i>
                            @php
                                $bsdate = new App\Http\Controllers\Backend\BsdateController();
                                $date = \Carbon\Carbon::now()->format('Y-m-d');
                                $a = get_nepali_date($date);
                                $year = \Carbon\Carbon::parse($a)->format('Y');
                                $month = \Carbon\Carbon::parse($a)->format('m');
                                $date = \Carbon\Carbon::parse($a)->format('d');
                                $day = \Carbon\Carbon::now()->addDay()->dayOfWeek;
                                $nepMonth = $bsdate->_get_nepali_month($month);
                                $nepDate = $bsdate->convert_to_nepali_number($date);
                                $nepYear = $bsdate->convert_to_nepali_number($year);
                                $nepDay = $bsdate->_get_day_of_week($day);
                            @endphp
                            {!! $nepYear.' - '.$nepMonth.' - '.$nepDate !!} | {!! $nepDay !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" style="display: flex; align-items: center;">
                    @forelse($ads as $ad)
                        @if($ad->rank == 1)
                            <div class="header_ads">
                                <a href="{{$ad->url}}" title="{{$ad->title}}">
                                    <img width="100%"
                                         src="{{$ad->image}}"
                                         alt="">
                                </a>
                            </div>
                        @endif
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item" id="menu-bar">
                        <a class="nav-link active" role="button" aria-current="page">

                            <img width="25px"
                                 src="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img/https://sarokaronline.com/wp-content/uploads/2019/11/fav.png"
                                 alt="">
                        </a>
                    </li>
                    <li class="nav-item" id="">
                        <a class="nav-link" href="{{url('/')}}" aria-current="page">गृहपृष्ठ</a>
                    </li>
                  
                    @foreach($newsCats as $newsCategory)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{route('category-slug',$newsCategory->slug)}}"
                               id="navbarDropdown" role="button"
                               aria-expanded="false">{{$newsCategory->title}}</a>
                            @if(count($newsCategory->subCategories) > 0)
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($newsCategory->subCategories as $subCategory)
                                        <li>
                                            <a class="dropdown-item"
                                               href="{{route('sub.category-slug',$subCategory->slug)}}">
                                                {{$subCategory->sub_category_name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>


    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("navbar");
    var sticky = header.offsetTop + 80;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
