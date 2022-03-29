<!-- sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-logo" style="width: 245px;">
        <a href="{{url('/')}}">
            @if(getSetting('logo'))
                <img width="100%" src="{{getSetting('logo')}}" alt="Site Logo"/>
            @else
                <img width="240px"
                     src="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img/https://sarokaronline.com/wp-content/uploads/2019/12/sarokaronline-final.png"
                     alt=""/>
            @endif
        </a>

    </div>

    <div class="sidebar-body">
        <ul>
            @forelse($newsCategory as $newsCategory)
                <li>
                    <a href="{{route('category-slug',$newsCategory->slug)}}">{{$newsCategory-> title}}</a>
                </li>
            @empty
            @endforelse
        </ul>
    </div>
</div>

<script>
    $("#menu-bar").click(function () {
        $('#sidebar').toggleClass('open-sidebar')
    });
</script>


