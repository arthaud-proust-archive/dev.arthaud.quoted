@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "Error 404 - Quote by Server")
@section('description', '"Not found"')
@section('content')
<main id="quote">
    <h3 class="quote-author">
        Error client (code:404)
    </h3>
    <h1 id="quote-content">Not found</h1>
    <span class="quote-author">
        Server
    </span>
    <span class="quote-updated_at">
        {{Carbon\Carbon::now()}}
    </span>

</main>
@endsection