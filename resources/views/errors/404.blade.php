@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "404 Not Found - Quote by Server")
@section('description', '"Not found"')
@section('content')
<main id="quote">
    <h3 class="quote-author">
        Erreur client (code:404)
    </h3>
    <h1 id="quote-content">Il faut être perdu, il faut avoir perdu le monde, pour se trouver soi-même.</h1>
    <span class="quote-author">
        Par Henry David Thoreau
    </span>
    <span class="quote-updated_at">
        {{Carbon\Carbon::now()}}
    </span>

</main>
@endsection