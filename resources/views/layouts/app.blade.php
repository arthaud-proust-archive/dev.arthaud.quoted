<?php 

$description = View::hasSection('description')?View::getSection('description'):'Lisez, écrivez et partagez des citations quelles qu\'elles soient. Par arthaud Proust.';
$title = View::hasSection('title')?View::getSection('title').' - '.config('app.name', 'Quoted'):'Quoted';
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

    <!-- Scripts -->
    <script src="{{ asset('js/fitty.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Seo -->
    <meta name="robots" content="all">
    <meta name="target" content="all">
    <meta name="author" content="Arthaud Proust">
    <meta name="owner" content="Arthaud Proust">
    <meta name="language" content="fr">

    <meta http-equiv="content-language" content="fr" />
    <meta name="url" content="https://quoted.arthaud.dev">
    <meta name="identifier-URL" content="https://quoted.arthaud.dev">
    <link rel="canonical" href="https://quoted.arthaud.dev" />

    <meta name="subject" content="Quotes">
    <meta name="description" content="{{ $description }}" />
    <meta name="keywords" content="quoted, citations, philosophie, litterature, arthaud, proust">
    <meta name="theme-color" content="#16161a">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://quoted.arthaud.dev" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <!-- <meta property="og:site_name" content="{{config('app.name', 'Quotes')}}" /> -->
    <meta property="og:locale" content="en" />
    <meta property="og:image" content="https://quoted.arthaud.dev/img/hero.min.png" />

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ $title }}" />
    <meta property="twitter:description" content="{{ $description }}" />
    <meta property="twitter:site" content="https://quoted.arthaud.dev" />
    <meta property="twitter:image" content="https://quoted.arthaud.dev/img/hero.min.png" />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="{{ $title }}" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#16161a">

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "{{config('app.name', 'Quoted')}}",
            "url": "https://quoted.arthaud.dev",
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

        <div class="container">
              
        @if(session('status'))
        <div class="alert-container">
            <div class="alert alert-{{session('content')?session('status'):'info'}}" role="alert">
                {{ session('content')?session('content'):session('status') }}
                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
                    <!-- <span aria-hidden="true">&times;</span> -->
                <!-- </button> -->
            </div>
        </div>
        @endif

        @yield('content')

        <footer>
            <a class="credit" href="https://arthaud.dev">@lang('content.footer.credit')</a>
            <span class="copyright">&copy 2020 @lang('content.footer.right')</span>
            <!-- <a class="about" href="{{ route('about') }}">@lang('content.footer.more')</a> -->
        </footer>
    </div>
</body>
</html>
