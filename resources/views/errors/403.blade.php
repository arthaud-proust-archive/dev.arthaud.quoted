@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "Error 403 - Quote by Server")
@section('description', '"Forbidden"')
@section('content')
<main id="quote">
    <h3 class="quote-author">
        Error client (code:403)
    </h3>
    <h1 id="quote-content">Forbidden</h1>
    <span class="quote-author">
        Server
    </span>
    <span class="quote-updated_at">
        {{Carbon\Carbon::now()}}
    </span>

</main>
@endsection