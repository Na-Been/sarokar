@extends('backend.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
    @include('backend.layouts.header')
    <!-- END: Top Bar -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Dashboard
                        </h2>
                        <a href="{{route('dashboard')}}" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i
                                data-feather="refresh-ccw"
                                class="w-4 h-4 mr-3"></i>
                            Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('news-category.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="sidebar" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$newsCatCount}}</div>
                                        <div class="text-base text-gray-600 mt-1">News Categories</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('news-sub-category.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="sidebar" class="report-box__icon text-theme-11"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$newsSubCat}}</div>
                                        <div class="text-base text-gray-600 mt-1">News Sub Category</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('news.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="file-text" class="report-box__icon text-theme-12"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$newsCount}}</div>
                                        <div class="text-base text-gray-600 mt-1">News</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('video.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="youtube" class="report-box__icon text-theme-9"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$videoCount}}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Video</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('advertisement.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="zap" class="report-box__icon text-theme-9"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$adCount}}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Ads</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('team.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$teamMember}}</div>
                                        <div class="text-base text-gray-600 mt-1">Our Team Member</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('page.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="camera" class="report-box__icon text-theme-9"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$pages}}</div>
                                        <div class="text-base text-gray-600 mt-1">Pages</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <a href="{{route('user.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-9"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$users}}</div>
                                        <div class="text-base text-gray-600 mt-1">Users</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
    </div>
@endsection
