<head>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <link rel="icon" href="{{asset('images/front/favicon.ico')}}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css"
          href="//fonts.googleapis.com/css?family=Lato:300i,400,400i,700%7CMontserrat:400,500,600,700%7CPlayfair+Display:400,700,700i%7COswald:400,700,700i">
    <link rel="stylesheet" href="{{ asset('css/front/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/style.css') }}">
    <style>.ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {
            display: block;
        }</style>
</head>
