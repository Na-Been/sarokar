<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')
<body>
<!-- navbar -->
@include('frontend.layouts.header')

@yield('content')
<!-- footer -->
@include('frontend.layouts.footer')
@include('frontend.layouts.sidebar')
</body>
</html>
