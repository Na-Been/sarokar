<head>
    <meta charset="utf-8">
    <!--<link href="{{asset('dist/images/logo.svg')}}" rel="shortcut icon">-->
    <link rel="icon" href="{{asset('lex.png')}}" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>{{getSetting('site_title')}} - @yield('title')</title>
     <!--<link rel="icon" href="{{asset('css/dist/news_logo.png')}}" type="image/gif" sizes="16x16">-->
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('css/dist/table.css')}}"/>
    <link rel="stylesheet" href="{{asset('back/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
       <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
   
    <!-- END: CSS Assets-->
    <style>
        .content{
            min-height: 100% !important;
        }
    </style>
</head>
