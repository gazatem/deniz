<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @section('title')
        @show
    </title>
    @section('header')

    @show
    <link href="{{ asset('themes/starter/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/starter/css/theme.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>

    @include('partials.header')
    <div id="main">
        @yield('content')
    </div>
    @include('partials.footer')
    <script src="{{ asset('themes/starter/js/app.js') }}"></script>
    <script src="{{ asset('themes/starter/js/theme.js') }}"></script>
    @yield('scripts')
</body>

</html>