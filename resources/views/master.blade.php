<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DenisCh Laravel + VueJS Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><a class="navbar-brand" href="{{ route('home') }}">Laravel + VueJS</a></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sign') }}">Sign the GuestBook</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="card text-center">
                <div class="card-header">
                    Laravel(PHP/Sqlite) + Pusher + VueJs + Bootstrap CSS
                </div>
                <div class="card-body">
                    <h5 class="card-title">Guest book example</h5>
                    <p class="card-text">
                        Laravel-Vue SPA(Single Page Application). API Authentication using Jwt Auth.
                    </p>
                    <p class="card-text">The following resources were used</p>
                    <ul>
                        <li>NodeJS v12.9.1</li>
                        <li>Laravel {{ App::VERSION() }}</li>
                        <li>VueJS 2.6.10</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>