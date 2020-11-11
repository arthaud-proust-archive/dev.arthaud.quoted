@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "All quotes")
@section('content')
<main>
    <h2>All Quotes here, read them!</h2>

    <article id="all-quotes">
    @foreach($quotes as $quote) 
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

</main>
@endsection