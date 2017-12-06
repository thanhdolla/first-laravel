<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">

    @yield('styles')
</head>
<body>
    @yield('index')

    <!-- <script src="{{ URL::asset('js/index.js') }}"></script> -->
    <!-- <script src="{{ URL::asset('js/jquery.js') }}"></script> -->
    @yield('scripts')
</body>
</html>
