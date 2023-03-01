<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>
    <x-nav/>
    <div class="container p-2">
        <h1>@yield('title')</h1>
        @if ($message = session()->get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
