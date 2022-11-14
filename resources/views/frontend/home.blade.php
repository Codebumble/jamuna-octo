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
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset(mix('fonts/font-awesome/css/font-awesome.min.css')) }}">
    <style>
        /* General Styling */
        @media (max-width: 567px) {
            h1 {
                font-size: 7vw;
                text-align: center;
            }
        }


        /* Loader Styles start here */
        .loader-wrapper {
            --line-width: 5px;
            --curtain-color: #f1faee;
            --outer-line-color: rgb(248 113 113);
            --middle-line-color: rgb(225 29 72);
            --inner-line-color: rgb(220 38 38);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
        }

        .loader {
            display: block;
            position: relative;
            top: 50%;
            left: 50%;
            /*   transform: translate(-50%, -50%); */
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: var(--line-width) solid transparent;
            border-top-color: var(--outer-line-color);
            border-radius: 100%;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            z-index: 1001;
        }

        .loader:before {
            content: "";
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: var(--line-width) solid transparent;
            border-top-color: var(--inner-line-color);
            border-radius: 100%;
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite;
        }

        .loader:after {
            content: "";
            position: absolute;
            top: 14px;
            left: 14px;
            right: 14px;
            bottom: 14px;
            border: var(--line-width) solid transparent;
            border-top-color: var(--middle-line-color);
            border-radius: 100%;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .loader-wrapper .loader-section {
            position: fixed;
            top: 0;
            background: var(--curtain-color);
            width: 51%;
            height: 100%;
            z-index: 1000;
        }

        .loader-wrapper .loader-section.section-left {
            left: 0
        }

        .loader-wrapper .loader-section.section-right {
            right: 0;
        }

        /* Loaded Styles */
        .loaded .loader-wrapper .loader-section.section-left {
            transform: translateX(-100%);
            transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        .loaded .loader-wrapper .loader-section.section-right {
            transform: translateX(100%);
            transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        }

        .loaded .loader {
            opacity: 0;
            transition: all 0.3s ease-out;
        }

        .loaded .loader-wrapper {
            visibility: hidden;
            transform: translateY(-100%);
            transition: all .3s 1s ease-out;
        }
    </style>
</head>

<body class="overflow-x-hidden antialiased">
    <div class="loader-wrapper">
        <div class="loader">
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!--  Page Content goes here  -->
    <div id="app"></div>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
    <script>
        // For Live Projects
        window.addEventListener('load', function() {
            document.querySelector('body').classList.add("loaded")
        });
    </script>
</body>

</html>
