<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', config('app.name'))</title>

    @vite('resources/css/admin/admin.scss')
</head>
<body class="bg-light">

    <div id="preloader" class="preloader active">
        <div class="preloader-spinner"></div>
    </div>

    <main class="h-100">
        @yield('content')
    </main>

    @vite('resources/js/admin/admin.js')

    @stack('footer-scripts')
</body>
</html>
