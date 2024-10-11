<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layout.headerLink')

    <title>@yield('title')</title>
    @section('style')
    @show
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('dashboard.layout.sidebar')
    @yield('content')
    @include('dashboard.layout.footerLink')
    @section('script')
    @show
</body>

</html>

