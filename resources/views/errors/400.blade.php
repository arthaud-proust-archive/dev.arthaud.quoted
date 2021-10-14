@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "400 Mauvaise requête - Quote by Server")
@section('description', '"Wrong request"')
@section('content')
<main id="quote">
    <h1 id="quote-content">"400 Mauvaise requête"</h1>
    <span class="quote-author">
        Par Serveur
    </span>
    <span class="quote-updated_at">
        {{Carbon\Carbon::now()}}
    </span>

</main>
@endsection