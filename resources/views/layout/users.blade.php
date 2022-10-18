<!doctype html>
<html>
<head>
    @include('includes.user.header')
</head>
<body style="background-color: rgba(245,245,245);">
    @include('includes.head')
    <div id="content" class="position-relative w-100" style="overflow-y: auto; height: calc(100vh - 64px);">
        @yield('content')
    </div>
</body>
</html>
