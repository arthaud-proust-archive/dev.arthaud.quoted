@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Search result")
@section('content')
<main>
    
    @if(count($quotes)==0)
    <h2>No any result...</h2>
    @elseif(count($quotes)==1)
    <h2>Search result</h2>
    @else
    <h2>Search results</h2>
    @endif

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