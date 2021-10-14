@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "403 Non autorisé - Quote by Server")
@section('description', '"Forbidden"')
@section('content')
<main id="quote">
    <h1 id="quote-content">"403 Non autorisé"</h1>
    <span class="quote-author">
        Par Serveur
    </span>
    <span class="quote-updated_at">
        {{Carbon\Carbon::now()}}
    </span>

</main>
@endsection