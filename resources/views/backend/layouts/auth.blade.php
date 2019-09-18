<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/images/favicon.png" />
    <title>
        @section('title')
        | Control Panel
        @show
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link href="{{ mix('assets/backend/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('assets/backend/css/admin.css') }}" rel="stylesheet">

    @yield('css')

    <!-- Global site tag (gtag.js) - Google Ads: 756503582 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-756503582"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-756503582');
    </script>

    <!-- Event snippet for 1 conversion page -->
    <script>
    gtag('event', 'conversion', {
        'send_to': 'AW-756503582/iBxRCKzAxJcBEJ6o3egC'
    });
    </script>

</head>

<body class="">
    <div class="wrapper">


        <div class="panel-header panel-header-sm">
        </div>
        @yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <nav>
                    <ul>

                    </ul>
                </nav>
                <div class="copyright ">
                    <p class="text-center">&copy; 2019 <a href="http://www.gazatem.com">gazatem</a>
                        All Rights Reserved
                    </p>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <script src="{{ mix('assets/backend/js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>