<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <!-- Primary Meta Tags -->
    <title>{{ $meta->title }}</title>
    <meta name="title" content="{{ $meta->title }}">
    <meta name="description" content="{{ $meta->description }}">
    <meta name="keywords"
        content="Jamuna, Group, Company, jamuna group, hoorain, hooram, hoor, denims, electronics, news, jugantor, television, codebumble, software">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:title" content="{{ $meta->title }}">
    <meta property="og:description" content="{{ $meta->description }}">
    <meta property="og:image" content="{{ url('') . $meta->image }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('') }}">
    <meta property="twitter:title" content="{{ $meta->title }}">
    <meta property="twitter:description" content="{{ $meta->description }}">
    <meta property="twitter:image" content="{{ url('') . $meta->image }}">


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/ico/favicon.ico') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(mix('fonts/font-awesome/css/font-awesome.min.css')) }}">
</head>

<body class="overflow-x-hidden antialiased">
    <div id="app"></div>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
</body>

</html>
