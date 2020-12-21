@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "Citation de ".$quote->author)
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

    @if($quote->canUserTouch()) 
    <a id="toEdit" href="{{ route('quote.edit', ['hashid'=>$quote->hashid]) }}">@lang('content.show.edit')</a>
    @endif
</main>
@endsection