<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
@include('backend.layouts.head')
<!-- END: Head -->
<body class="app">
<div class="flex">
    @include('backend.layouts.sidebar')

    @yield('content')
</div>
@include('backend.layouts.footer')
</body>
</html>
