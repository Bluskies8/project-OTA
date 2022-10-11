<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <section id="back-office">
        <div class="d-flex">
            @include('includes.backoffice.sidenav')
            <div class="w-100">
                @include('includes.backoffice.header')
                <div id="content" class="position-relative" style="overflow-y: auto; height: calc(100vh - 48px);">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</body>
</html>
