@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "About")
@section('content')
<main>
    <h1 id="hero" class="hero-min">@lang('content.about.title')</h1>

    <article id="why">
        <header>
            <h3>@lang('content.about.why.title')</h3>
        </header>

        @foreach(__('content.about.why.content') as $paraph)
        <p>{{ $paraph }}</p>
        @endforeach
    </article>

    <article id="what">
        <header>
            <h3>@lang('content.about.what.title')</h3>
        </header>
        
        @foreach(__('content.about.what.content') as $paraph)
        <p>{{ $paraph }}</p>
        @endforeach
    </article>

    <article id="how">
        <header>
            <h3>@lang('content.about.how.title')</h3>
        </header>
        @foreach(__('content.about.how.content') as $paraph)
        <p>{{ $paraph }}</p>
        @endforeach
    </article>
</main>
@endsection