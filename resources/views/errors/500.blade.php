@extends('layouts.app', ['requirementsJs' => ['app']])


@section('title', "Error 500 - Quote by Arnold Schwarzenegger")
@section('description', '"I\'ll be back"')
@section('content')
<main id="quote">
    <h3 class="quote-author">
        Error server (code:500)
    </h3>
    <h1 id="quote-content">I'll be back</h1>
    
    <span class="quote-author">
        Arnold Schwarzenegger
    </span>
    <span class="quote-updated_at">
        {{Carbon\Carbon::now()}}
    </span>

    

</main>
@endsection