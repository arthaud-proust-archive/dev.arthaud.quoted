@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "About")
@section('content')
<main>
    <h1 id="hero">Why, what?</h1>
    <!-- <h2 class="subtitle">{{config('app.subtitle')}}</h2> -->
    <article id="what">
        <header>
            <h3>What?</h3>
        </header>
        <p>
            One moment, one sentence. Put this sentence out of context and you will get a quote.
        </p>
        <p>
            A website which is a collection of best sentences from anybody. Without any context. These sentences shouldn't be taked with serious. By the way, the website and his owner will can't be designated at responsable because anybody can write whatever they want.
        </p>
        <p>
            You may will see political, borderline or controversial sentences, black humor lyrics, philosophic and official quotes. Keep in mind this website don't support any really racial, sexist, or hateful content.
        </p>
        <p>
        When the current trend is to argue with everything, whithout let a place to the initial expression liberty, please be openminded. Obviously, if you think a content is inappropriate you can contact the owner at contact@proust.dev, or delete by yourself the content.
        </p>
    </article>

    <article id="why">
        <header>
            <h3>Why?</h3>
        </header>
        <p>
            To regroup any types of quotes, because a quote is not necessary or a sacral philosophic sentence. 
        </p>
    </article>

</main>
@endsection