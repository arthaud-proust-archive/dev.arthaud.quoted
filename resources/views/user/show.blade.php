@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "About")
@section('content')
<main class="min">
    <h2 class="hero-min">
        @if(Auth::check() && Auth::user()->name==$user->name)
            @lang('content.user.profil.title.me')
        @else
            @lang('content.user.profil.title.other') {{ $user->name }}
        @endif
    </h2>


    <div class="articles">

    <article id="info">
        <header>
            <h3>
                {{ $user->name }}
            </h3>
            
        </header>
        <p>{{ $user->email }}</p>
    </article>

    @if(Auth::check() && (Auth::user()->name==$user->name || Auth::user()->isAdmin()))
    <article id="actions">
        <header>
            <h3>
                @lang('content.user.profil.actions.title')
            </h3>
            
        </header>
        @if(Auth::user()->name==$user->name)
            <a class="btn" href="{{ route('user.edit') }}">
                @lang('content.home.me.edit')
            </a>
            <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                @lang('content.user.profil.actions.logout')
            </a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @elseif(Auth::user()->isAdmin())
            <form id="roleForm" action="{{ route('user.role', $user->hashid) }}" method="POST">
                @csrf
                <label>
                @lang('content.user.profil.actions.role.label')
                <input id="role" name="role" value="{{$user->role}}">
                </label>
                <input type="submit" value="@lang('content.user.profil.actions.role.confirm')">
            </form>
        @endif
        <!-- <p>{{ $user->role }}</p> -->
        <!-- <p>{{ $user->hashid }}</p> -->
    </article>
    @endif


    <article id="quotes">
        <header>
            <h3>
            @if(Auth::user()->name==$user->name)
                @choice('content.user.quotes.title.me', count($quotes))
            @else 
                @choice('content.user.quotes.title.other', count($quotes)) {{ $user->name }}
            @endif
            </h3>
        </header>
        
        @if(Auth::check() && Auth::user()->name==$user->name)
        <a class="btn" href="{{ route('quote.create') }}">
            @lang('content.user.profil.actions.new')
        </a>
        @endif

        @foreach($quotes as $quote) 
        <section class="quoteCard">
            <a href="{{ route('quote.show', ['hashid'=>$quote->hashid]) }}">
            <blockquote class="quoteCard-content">
                {{$quote->content}}
            </blockquote>
            <span class="quoteCard-author">
                {{$quote->author}}
            </span>
            <span class="quoteCard-updated_at">
                {{$quote->updated_at}}
            </span>
            </a>
        </section>
        @endforeach
    </article>


    </div>
</main>
@endsection