@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "Quote by ".$quote->author)
@section('description', '"'.$quote->content.'"')
@section('content')
<main id="quote">
    <h1 id="quote-content">{{$quote->content}}</h1>
    <span class="quote-author">
        {{$quote->author}}
    </span>
    <span class="quote-updated_at">
        {{$quote->updated_at}}
    </span>
    <a id="toEdit" href="{{ route('quote.edit', $quote->uuid) }}">Edit this quote</a>

</main>
@endsection