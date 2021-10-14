@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "Citation de ".$quote->author)
@section('description', '"'.$quote->content.'"')
@section('content')
<main id="quote">
    <h1 id="quote-content">{{$quote->content}}</h1>
    <span class="quote-author">
        Citation par <b>{{$quote->author}}</b>
    </span>
    <span class="quote-updated_at">
        ajoutée le {{$quote->created_at->format('d M Y')}} par {{$quote->userModel->name}}
    </span>

    @if($quote->canUserTouch()) 
    <a id="toEdit" class="btn" href="{{ route('quote.edit', ['hashid'=>$quote->hashid]) }}">@lang('content.show.edit')</a>
    @endif

    <div id="share">
        <div id="share-box">
        Partager la citation 
        <kbd class="select-all">{{ config('app.url') }}/{{ $quote->hashid}}</kbd>
        </div>
    </div>
</main>
@endsection