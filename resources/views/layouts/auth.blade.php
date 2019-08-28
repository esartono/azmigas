<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">

</head>
<body>
    <div class="main">
        <div class="container">
            <center>
                <div class="middle">
                    <div id="login">
                        @yield('content')
                        <div class="clearfix"></div>
                    </div> <!-- end login -->
                    <div class="logo">AZCO
                        <div class="clearfix"></div>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <!-- Scripts -->
</body>
</html>
