<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ env("APP_NAME")}} is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, codebumble, {{ env("APP_NAME")}}, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="Codebumble Inc.">
        <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo/favicon.ico')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset(mix('fonts/font-awesome/css/font-awesome.min.css'))}}">
        <link rel="stylesheet" href="{{asset('frontend/css/app.css')}}">
    </head>
    <body class="antialiased overflow-x-hidden">
        <div id="app"></div>
        <script src="{{ asset('frontend/js/app.js') }}"></script>
    </body>
</html>