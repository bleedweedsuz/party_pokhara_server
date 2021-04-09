<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <link rel="icon" type="image/png" href="images/DB_16х16.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Party Pokhara - Admin - Dashboard</title>
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/lib/getmdl-select.min.css">
        <link rel="stylesheet" href="css/lib/nv.d3.min.css">
        <link rel="stylesheet" href="css/application.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        @include('partials.header')
        @include('partials.nav')
        <main class="mdl-layout__content">
            <div class="mdl-grid mdl-grid--no-spacing dashboard">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="js/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/getmdl-select.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/nv.d3.min.js"></script>
    <script src="js/layout/layout.min.js"></script>
    <script src="js/scroll/scroll.min.js"></script>
    <script src="js/jquery.loading.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('css_script')
    </body>
</html>