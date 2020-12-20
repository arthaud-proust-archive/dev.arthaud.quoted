@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "All quotes")
@section('content')
<main>

    <h2 class="hero-min">@lang('content.user.index.title')</h2>

    <article id="all-users">
    @foreach($users as $user) 
    <section class="userCard">
        <a href="{{ route('user.show', $user->hashid)}} ">
        <span class="userCard-name">
            {{$user->name}}
            <span class="userCard-role">{{$user->rolename}}</span>
        </span>
        <span class="userCard-email">
            {{$user->email}}
        </span>
        </a>
    </section>
    @endforeach

</main>
@endsection