@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Home")
@section('content')
<main>
    <h1 id="hero" class="fade">{{config('app.name', 'Quotes')}}</h1>
    <h2 class="subtitle fade">@lang('content.home.subtitle')</h2>

    <article id="philo-quotes">
        <header>
            <h3>@lang('content.home.philo.title') - <a href="{{route('quote.index', ['lang'=>App::getLocale()])}}">@lang('content.home.philo.more')</a></h3>
        </header>
        @foreach($philoQuotes as $quote) 
        <section class="quoteCard">
            <a href="{{ route('quote.show', ['lang'=>App::getLocale(), 'uuid'=>$quote->uuid]) }}">
            <blockquote class="quoteCard-content">
                {{$quote->content}}
            </blockquote>
            <span class="quoteCard-author">
                {{$quote->author}}
            </span>
            <span class="quoteCard-updated_at">
                {{$quote->updated_at}}
            </span>
            </a>
        </section>
        @endforeach
    </article>



    <article id="latest-quotes">
        <header>
            <h3>@lang('content.home.latest.title') - <a href="{{route('quote.index', ['lang'=>App::getLocale()])}}">@lang('content.home.latest.more')</a></h3>
        </header>
        @foreach($lastQuotes as $quote) 
        <section class="quoteCard">
            <a href="{{ route('quote.show', ['lang'=>App::getLocale(), 'uuid'=>$quote->uuid]) }}">
            <blockquote class="quoteCard-content">
                {{$quote->content}}
            </blockquote>
            <span class="quoteCard-author">
                {{$quote->author}}
            </span>
            <span class="quoteCard-updated_at">
                {{$quote->updated_at}}
            </span>
            </a>
        </section>
        @endforeach
    </article>


    <article id="popular-quotes">
        <header>
            <h3>@lang('content.home.popular.title') - <a href="{{route('quote.index', ['lang'=>App::getLocale(), 'order'=>'popularity'])}}">@lang('content.home.popular.more')</a></h3>
        </header>
        @foreach($popularQuotes as $quote) 
        <section class="quoteCard">
            <a href="{{ route('quote.show', ['lang'=>App::getLocale(), 'uuid'=>$quote->uuid]) }}">
            <blockquote class="quoteCard-content">
                {{$quote->content}}
            </blockquote>
            <span class="quoteCard-author">
                {{$quote->author}}
            </span>
            <span class="quoteCard-updated_at">
                {{$quote->updated_at}}
            </span>
            </a>
        </section>
        @endforeach
    </article>
</main>
@endsection