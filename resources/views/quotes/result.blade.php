@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Search result")
@section('content')
<main>
    

    <h2>@choice('content.results.title', count($quotes))</h2>

    <article id="all-quotes">
    @foreach($quotes as $quote) 
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

</main>
@endsection