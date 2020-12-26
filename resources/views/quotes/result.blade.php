@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Recherche")
@section('content')
<main>
    

    <h1 id="hero" class="hero-min">@choice('content.results.title', count($quotes))</h1>

    <article id="all-quotes">
    @foreach($quotes as $quote) 
    <section class="quoteCard">
        <a href="{{ route('quote.show', ['hashid'=>$quote->hashid]) }}">
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

</main>
@endsection
