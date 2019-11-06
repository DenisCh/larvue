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
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                <router-link class="navbar-brand" :to="{ name: 'home' }">Laravel + VueJS</router-link>
                
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'signature-form' }">Sign the GuestBook</router-link>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav ">
                        <li class="dropdown">
                            <a href="#" class="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;">
                                <i class="fa fa-bell-o fa-2x text-danger" aria-hidden="true"></i><sup class="text-danger" style="vertical-align:10px;font-weight: 600">2</sup>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" style="width: 400px">
                                <li class="dropdown-header text-center">New Signaturies</li>
                                <li>
                                    <span style="padding: 10px;">New signature by <a href="#"> Denis Ch</a></span>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li class="text-right"><button class="btn btn-outline-info" v-on:click="clearEvents()" style="padding: 10px;">Clear all</button></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
            </nav>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>