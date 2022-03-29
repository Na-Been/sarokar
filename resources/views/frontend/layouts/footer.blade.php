<!-- footer -->
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <div class="logo">
                        @if(getSetting('logo'))
                            <img src="{{getSetting('logo')}}" alt="">
                        @else
                            <img
                                src="https://cdn.shortpixel.ai/client/to_webp,q_glossy,ret_img/https://sarokaronline.com/wp-content/uploads/2019/12/sarokaronline-final.png"
                                alt=""/>
                        @endif
                    </div>
                    <ul class="ms-md-4 lex-info-list">
                        <li>Email: {{getSetting('email')}}</li>
                        <li>Phone: {{getSetting('phone_number')}}</li>
                        <li>Mobile: {{getSetting('mobile_number')}}</li>
                    </ul>

                </div>
                <div class="col-md-3  mt-4">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class=" ">
                        <li><a href="{{url('/')}}">Home</a></li>
                    </ul>
                </div>
                <div class="col-md-3  mt-4">
                    <h3 class="footer-title">Our Team</h3>
                    <ul class="team " style="columns: 2;">
                        @forelse($teams as $team)
                            <ul class="team " style="columns: 2;">
                                <li><span>{!! $team->designation !!}</span>
                                    <h6>
                                        <b> {{$team->name}}</b>
                                    </h6>
                                </li>
                            </ul>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="col-md-2  mt-4">
                    <h3 class="footer-title">Follow Us On</h3>

                    <ul class="footer-social-icon d-flex" style="justify-content: space-between;">
                        <li>
                            <a href="{{getSetting('facebook_link')}}"> <i class="fab fa-facebook-square" style="color: #1a427a;"></i>&nbsp;</a>
                        </li>
                        <li>
                            <a href="{{getSetting('twitter_link')}}"> <i class="fab fa-twitter-square" style="color: #1DA1F2;"></i>&nbsp;</a>
                        </li>
                        <li>
                            <a href="{{getSetting('linkedin_link')}}"> <i class="fab fa-linkedin-in" style="color: #1DA1F2;"></i>&nbsp;</a>
                        </li>
                        <li>
                            <a href="{{getSetting('instagram_link')}}"> <i class="fab fa-instagram-square " style="color: tomato;">&nbsp;</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom" style="background: #1a427a">
        <div class="container">
            <p class="text-center text-white py-3 m-0">
                © {{now()->year}} {{getSetting('site-title')??'Sarokar News'}} . All Rights Reserved || Developed by:
                Namuna
                Computer
            </p>
        </div>
    </div>
</footer>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{asset('css/dist/slick-1.8.1/slick/slick.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js "
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0 "
        crossorigin="anonymous "></script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60814e434003525e"></script>
<script>
    $("#menu-bar").click(function () {
        $('#sidebar').toggleClass('open-sidebar')
    });

</script>
<script>
    $(document).ready(function () {
        $('.close-sidebar').on('click', function () {
            $('#sidebar').removeClass('open-sidebar')
        });
    });


</script>

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
 
    var disqus_config = function () {
    this.page.url = window.location.href;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = window.location.href; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
 
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://sarokaronline-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>



