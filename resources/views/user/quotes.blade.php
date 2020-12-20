@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', $user->name."'s quotes")
@section('content')
<main>
    <h1 id="hero" class="hero-min">
        @if(Auth::user()->name==$user->name)
            @choice('content.user.quotes.title.me', count($quotes))
        @else 
            @choice('content.user.quotes.title.other', count($quotes)) {{ $user->name }}
        @endif
    </h1>

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
    </article>

</main>
@endsection