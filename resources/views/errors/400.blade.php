@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "Error 400 - Quote by Server")
@section('description', '"Wrong request"')
@section('content')
<main id="quote">
    <h3 class="quote-author">
        Error client (code:400)
    </h3>
    <h1 id="quote-content">Wrong request</h1>
    <span class="quote-author">
        Server
    </span>
    <span class="quote-updated_at">
        {{Carbon\Carbon::now()}}
    </span>

</main>
@endsection