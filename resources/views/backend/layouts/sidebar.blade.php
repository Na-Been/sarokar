<nav class="side-nav">
    <a href="{{route('dashboard')}}" class="intro-x flex items-center pl-5 pt-4">
        @if(getSetting('logo'))
            <img src="{{getSetting('logo')}}">
        @else
            <img src="{{asset('front/logo.png')}}">
        @endif
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul id="mainsidebar">
        <li>
            <a href="{{route('dashboard')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="home"></i></div>
                <div class="side-menu__title"> Dashboard</div>
            </a>
        </li>
        @canany(['isSuperAdmin','isAdmin'])
            <li>
                <a href="{{route('user.index')}}" class="side-menu">
                    <div class="side-menu__icon"><i data-feather="users"></i></div>
                    <div class="side-menu__title"> Users</div>
                </a>
            </li>
        @endcanany
        <li>
            <a href="{{route('page.index')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="hard-drive"></i></div>
                <div class="side-menu__title"> Pages</div>
            </a>
        </li>
        <li>
            <a href="javascript:;"
               class="side-menu {{request()->routeIs('news-category.index') || request()->routeIs('news-sub-category.index') ||request()->routeIs('news.index')?'side-menu--active side-menu--open' : ''}} ">
                <div class="side-menu__icon"><i data-feather="package"></i></div>
                <div class="side-menu__title"> News List <i data-feather="chevron-down"
                                                            class="side-menu__sub-icon"></i></div>
            </a>
            <ul class="{{request()->routeIs('news-category.index') || request()->routeIs('news-sub-category.create')|| request()->routeIs('news.index') ?'side-menu__sub-open' : ''}} ">
                <li>
                    <a href="{{route('news.index')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="file-text"></i></div>
                        <div class="side-menu__title">News</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('news-category.index')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="sidebar"></i></div>
                        <div class="side-menu__title">Category</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('news-sub-category.index')}}" class="side-menu">
                        <div class="side-menu__icon"><i data-feather="sidebar"></i></div>
                        <div class="side-menu__title">Sub Category</div>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="{{route('photo.index')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="image"></i></div>
                <div class="side-menu__title"> Photo Feature</div>
            </a>
        </li>
        <li>
            <a href="{{route('advertisement.index')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="zap"></i></div>
                <div class="side-menu__title"> Advertisement</div>
            </a>
        </li>
        <li>
            <a href="{{route('media.index')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="camera"></i></div>
                <div class="side-menu__title"> Media</div>
            </a>
        </li>
        <li>
            <a href="{{route('video.index')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="youtube"></i></div>
                <div class="side-menu__title"> Video</div>
            </a>
        </li>
        <li>
            <a href="{{route('team.index')}}" class="side-menu">
                <div class="side-menu__icon"><i data-feather="user"></i></div>
                <div class="side-menu__title"> Our Team</div>
            </a>
        </li>

        @canany(['isSuperAdmin','isAdmin'])
            <li>
                <a href="{{route('setting.index')}}" class="side-menu">
                    <div class="side-menu__icon"><i data-feather="settings"></i></div>
                    <div class="side-menu__title"> Setting</div>
                </a>
            </li>
        @endcanany
    </ul>
</nav>
