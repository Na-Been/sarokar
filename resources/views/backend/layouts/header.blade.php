<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        {{--        @foreach(Request::segments() as $segment)--}}
        {{--            <a href="{{Request::url()}}" class="breadcrumb--active">{{\Illuminate\Support\Str::ucfirst($segment)}}</a>--}}
        {{--           --}}
        {{--        @endforeach--}}

        <?php $link = "" ?>
        @for($i = 1; $i <= count(Request::segments()); $i++)
            @if($i < count(Request::segments()) & $i > 0)
                <?php $link .= "/" . Request::segment($i); ?>
                <a class="breadcrumb--active"
                   href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a>
                <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            @else
                {{ucwords(str_replace('-',' ',Request::segment($i)))}}
            @endif
        @endfor
        
        
   
    </div>
    <!-- END: Breadcrumb -->
        <div class="d-menu">
            <i class="fas fa-bars" id="d-menu-bar" style="font-size:20px;cursor:pointer"></i>
        </div>
    <div class="intro-x dropdown w-8 h-8 profile-image">
        
        
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in ">
            @if(auth()->user()->avatar)
                <img alt="Dummy"
                     src="{{asset('image/'.auth()->user()->avatar)}}">
            @else
                <img alt="Dummy"
                     src="{{asset('uploads/users/dummyUser.png')}}">
            @endif
        </div>
        <div class="dropdown-box w-56">
            <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                    <div class="font-medium">{{auth()->user()->name}}</div>
                    <div class="text-xs text-theme-41 dark:text-gray-600">{{auth()->user()->email}}</div>
                </div>
                <div class="p-2">
                    <a href="{{route('profile')}}"
                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                    <a href="{{url('/')}}"
                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="layout" class="w-4 h-4 mr-2"></i> View Site </a>
                    <a href="{{route('profile')}}"
                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                </div>
                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')"
                           class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> {{ __('Log out') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
