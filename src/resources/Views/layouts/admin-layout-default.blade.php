<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/vof.admin/sidebar.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vof.admin/admin-layout.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    @yield('css')
    @yield('title')
</head>
<body>
    <div id="app">
        <div class="page-wrapper chiller-theme toggled">
            @yield('sidebar')
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
