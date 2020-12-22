@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Légal")
@section('content')
<main>
    <h1 id="hero" class="hero-min">@lang('content.legal.title')</h1>

    <article id="intro">
        <header>
            <h3>@lang('content.legal.intro.title')</h3>
        </header>

        <h3><a href="{{ asset('assets/mentions légales.pdf') }}">@lang('content.legal.intro.mentions')</a></h3>
        <h3><a href="{{ asset('assets/rgpd.pdf') }}">@lang('content.legal.intro.rgpd')</a></h3>
        <h3><a href="{{ asset('assets/conditions utilisation.pdf') }}">@lang('content.legal.intro.conditions')</a></h3>
    </article>
</main>
@endsection