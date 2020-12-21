@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Toutes les citations")
@section('content')
<main>

    <h2 class="hero-min">@lang('content.index.title')</h2>


    <form id="options" action="{{ route('quote.index') }}" method="GET">
        <label>
            @lang('content.index.orderby.label')
            <select name="order" id="order">
                @foreach(__('content.index.orderby.items') as $order)
                <option value="{{$order[1]}}" @if(Request::get('order')==$order[1]) selected @endif>{{ $order[0] }}</option>
                @endforeach
            </select>
        </label>

        <label>
            @lang('content.index.group.label')
            <select name="group" id="group">
                @foreach(__('content.index.group.items') as $group)
                <option value="{{$group[1]}}" @if(Request::get('group')==$group[1]) selected @endif>{{ $group[0] }}</option>
                @endforeach
                @foreach($groups as $group)
                <option value="{{$group->uuid}}" @if(Request::get('group')==$group->uuid) selected @endif>{{ $group->name }}</option>
                @endforeach
            </select>
        </label>
    </form>

    <article id="all-quotes">
    @foreach($quotes as $quote) 
    <section class="quoteCard">
        <a href="{{ route('quote.show', ['hashid'=> $quote->hashid]) }}">
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