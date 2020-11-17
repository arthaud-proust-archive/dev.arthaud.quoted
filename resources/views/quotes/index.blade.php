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

    <h2>@lang('content.index.title')</h2>


    <form id="options" action="{{ route('quote.index', ['lang'=>App::getLocale()]) }}" method="GET">
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
                <option value="all" @if(Request::get('group')=="all") selected @endif>All</option>
                @foreach($groups as $group)
                <option value="{{$group->uuid}}" @if(Request::get('group')==$group->uuid) selected @endif>{{ $group->name }}</option>
                @endforeach
                <option value="none" @if(Request::get('group')=="none") selected @endif>None</option>
            </select>
        </label>
    </form>

    <article id="all-quotes">
    @foreach($quotes as $quote) 
    <section class="quoteCard">
        <a href="{{ route('quote.show', ['lang'=>App::getLocale(), 'uuid'=> $quote->uuid]) }}">
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