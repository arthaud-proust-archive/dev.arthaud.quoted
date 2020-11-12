@extends('layouts.app', ['requirementsJs' => ['app']])

<?php

$orders = [
    ['Creation', 'creation'],
    ['Popularity', 'popularity']
];

?>

@section('title', "All quotes")
@section('content')
<main>
    <form id="options" action="{{ route('quote.index') }}" method="GET">
        <label>
            Order by
            <select name="order" id="order">
                @foreach($orders as $order)
                <option value="{{$order[1]}}" @if(Request::get('order')==$order[1]) selected @endif>{{ $order[0] }}</option>
                @endforeach
            </select>
        </label>

        <label>
            Group
            <select name="group" id="group">
                <option value="none">None</option>
                @foreach($groups as $group)
                <option value="{{$group[1]}}" @if(Request::get('group')==$group[1]) selected @endif>{{ $group[0] }}</option>
                @endforeach
            </select>
        </label>
    </form>
    <h2>All Quotes here, click them!</h2>

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