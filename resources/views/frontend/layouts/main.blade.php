<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <title> @yield('title')</title>
    <style>
        @yield('css')
    </style>
    @include('frontend.layouts.headerLinkes')

</head>
@include('frontend.layouts.headerComponent')
@yield('content')
@include('frontend.layouts.footerComponent')
@include('frontend.layouts.footerLinkes')
@yield('js')

</body>
</html>
