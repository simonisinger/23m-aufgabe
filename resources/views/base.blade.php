<html lang="en">
    <head>
        <title>Mini Twitter</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="container mx-auto grid grid-flow-col auto-cols-3" id="app">
            <div id="menu-container" class="col-span-3">
                <main-menu></main-menu>
            </div>
            <div class="col-span-6 mr-auto mt-16">
                @yield('content')
            </div>
        </div>
    </body>
    <script src="{{ URL::asset('js/app.js') }}"></script>
</html>
