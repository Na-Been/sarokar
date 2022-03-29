<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
@include('backend.layouts.head')
<!-- END: Head -->
<body class="app">
<div class="flex">
    <!-- BEGIN: Side Menu -->
    @include('backend.layouts.sidebar')

    @yield('content')
</div>
@include('backend.layouts.footer')
<!-- END: JS Assets-->
</body>
</html>
