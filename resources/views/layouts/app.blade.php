<?php 

$description = View::hasSection('description')?View::getSection('description'):'Read, write and share quotes around the world.';
$title = View::hasSection('title')?View::getSection('title').' - '.config('app.name', 'Quotes'):'Quotes';
?>



<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;600;700&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/png" href="/favicon.ico" sizes="32x32">
    <link href="{{ asset('css/mobile-app.css') }}" rel="stylesheet" media="only screen and (max-width: 768px)">
    <link href="{{ asset('css/large-app.css') }}" rel="stylesheet" media="only screen and (min-width: 768px)">
    <!-- <script>
        let link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = '{{asset("css/")}}'+(window.screen.width<768?'/mobile-':'/large-')+'app.css';
        document.querySelector('head').appendChild(link);
    </script>
    <noscript>
        <link href="{{ asset('css/mobile-app.css') }}" rel="stylesheet" media="only screen and (max-width: 768px)">
        <link href="{{ asset('css/large-app.css') }}" rel="stylesheet" media="only screen and (min-width: 768px)">
    </noscript> -->

    <!-- Scripts -->
    <script src="{{ asset('js/fitty.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Seo -->
    <meta name="robots" content="all">
    <meta name="target" content="all">
    <meta name="author" content="Arthaud Proust">
    <meta name="owner" content="Arthaud Proust">
    <meta name="language" content="en">

    <meta http-equiv="content-language" content="en" />
    <meta name="url" content="https://quotes.arthaud.dev">
    <meta name="identifier-URL" content="https://quotes.arthaud.dev">
    <link rel="canonical" href="https://quotes.arthaud.dev" />

    <meta name="subject" content="Quotes">
    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="quotes, litterature, arthaud, proust">
    <meta name="theme-color" content="#16161a">

    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:site_name" content="{{config('app.name', 'Quotes')}}" />
    <meta property="og:url" content="https://quotes.arthaud.dev" />
    <meta property="og:locale" content="en" />
    <meta property="og:image" content="https://quotes.arthaud.dev/img/hero.min.png" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:site" content="https://quotes.arthaud.dev" />
    <meta name="twitter:image" content="https://quotes.arthaud.dev/img/hero.min.png" />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="Quotes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#16161a">

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "{{config('app.name', 'Quotes')}}",
            "url": "https://quotes.arthaud.dev",
            "address": "none",
            "sameAs": [
                "",
                "",
                "",
                ""
            ]
        }
    </script>
</head>
<body>
    <div id="app">
        <header>
            @include('layouts.nav')
        </header>

        @yield('content')

        <footer>
            <a class="credit" href="https://arthaud.dev">Made with passion by Arthaud Proust</a>
            <span class="copyright">&copy 2020 All rights reserved</span>
            <a class="about" href="{{ route('about') }}">About and more</a>
        </footer>
    </div>
</body>
</html>
