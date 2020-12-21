@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Contribuer")
@section('content')
<main class="min">
    <h1 id="hero" class="hero-min">@lang('content.contribute.title')</h1>

    <article id="join">
        <div class="actions">
            <a class="actions-btn" href="{{ route('register') }}">@lang('content.contribute.join.register')</a>
            <a class="actions-btn" href="{{ route('login') }}">@lang('content.contribute.join.login')</a>
        </div>
    </article>

    <article id="why">
        <header>
            <h3>@lang('content.contribute.why.title')</h3>
        </header>

        @foreach(__('content.contribute.why.content') as $paraph)
        <p>{{ $paraph }}</p>
        @endforeach
    </article>

    <article id="how">
        <header>
            <h3>@lang('content.contribute.how.title')</h3>
        </header>

        @foreach(__('content.contribute.how.content') as $paraph)
        <p>{{ $paraph }}</p>
        @endforeach
    </article>
</main>
@endsection