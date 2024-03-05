<html lang="en">
    <head>
        @vite('resources/js/app.js')
{{--        {!! Vite::content('node_modules/bootstrap/dist/css/bootstrap.css') !!}--}}

        <title>Laravel - @yield('title')</title>
    </head>
    <body>
        @include('fragments/_nav')
        <div class="container-fluid p-3">
            @include('fragments/_notifications')
            @include('fragments/_errors')
            @yield('body')
        </div>
    </body>
</html>
