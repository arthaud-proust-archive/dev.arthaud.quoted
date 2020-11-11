@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Home")
@section('content')
<main>
    <h1 id="hero">Quotes.</h1>
    <article id="latest-quotes">
        <header>
            <h3>Last five quotes - <a href="{{route('quote.index')}}">See more</a></h3>
        </header>
        @foreach($lastquotes as $quote) 
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
        <section class="quoteCard">
            <a>
            <blockquote class="quoteCard-content">
                Coming soon :)
            </blockquote>
            <span class="quoteCard-author">
                Arthaud
            </span>
            </a>
        </section>
    </article>
</main>
@endsection