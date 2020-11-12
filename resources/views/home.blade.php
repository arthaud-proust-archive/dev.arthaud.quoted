@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Home")
@section('content')
<main>
    <h1 id="hero">{{config('app.name', 'Quotes')}}</h1>
    <h2 class="subtitle">{{config('app.subtitle')}}</h2>
    <article id="latest-quotes">
        <header>
            <h3>Lastest - <a href="{{route('quote.index')}}">See all quotes</a></h3>
        </header>
        @foreach($lastQuotes as $quote) 
        <section class="quoteCard">
            <a href="{{ route('quote.show', $quote->uuid) }}">
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
            <h3>Popular quotes - <a href="{{route('quote.index')}}">See more</a></h3>
        </header>
        @foreach($popularQuotes as $quote) 
        <section class="quoteCard">
            <a href="{{ route('quote.show', $quote->uuid) }}">
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