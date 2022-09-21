<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body style="background-color: rgba(245,245,245);">
    @include('includes.header')
    <div id="content" class="position-relative w-100" style="overflow-y: auto;">
        @yield('content')
    </div>
</body>
</html>
