@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Accueil")
@section('content')
<main>
    <h1 id="hero" class="no-select" class="fade">{{config('app.name', 'Quotes')}}</h1>
    <!--
    @guest
        <h2 id="hero-subtitle" class="subtitle fade">@lang('content.home.subtitle')</h2>
    @else 
        <h2 id="hero-subtitle" class="subtitle fade">{{ Auth::user()->name}}</h2>
    @endguest
    -->
    <h2 id="hero-subtitle" class="subtitle fade">@lang('content.home.quotescount', ['count'=>$quotesCount]) </h2>
    
    <div class="articles">

    <article id="daily-quote">
        <header>
            <h3>
                @lang('content.home.daily.title') - 
                <a href="{{ route('quote.daily') }}">@lang('content.home.daily.more')</a>
            </h3>
        </header>
        <section class="quoteCard">
            <a href="{{ route('quote.show', ['hashid'=>$dailyQuote->hashid]) }}">
            <blockquote class="quoteCard-content">
                {{$dailyQuote->content}}
            </blockquote>
            <span class="quoteCard-author">
                {{$dailyQuote->author}}
            </span>
            <span class="quoteCard-updated_at">
                {{$dailyQuote->updated_at}}
            </span>
            </a>
        </section>
    </article>

    @auth
        <article id="me">
            <header>
                <h3>
                    @lang('content.home.me.title') - 
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        @lang('content.home.me.logout')
                    </a>    
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </h3>
            </header>
            <a class="btn" href="{{ route('quote.create') }}">
                @lang('content.home.me.new')
            </a>
            <a class="btn" href="{{ route('user.quotes') }}">
                @lang('content.home.me.quotes')
            </a>
            <a class="btn" href="{{ route('user.edit') }}">
                @lang('content.home.me.edit')
            </a>
            
            @if(Auth::check() && Auth::user()->isAdmin())
            <a class="btn" href="{{ route('user.index') }}">
                @lang('content.home.me.users')
            </a>
            @endif
            
        </article>
    @endauth


    @if(Auth::check() && Auth::user()->isAdmin())
    <article id="toverif-quotes">
        <header>
            <h3>@lang('content.home.toverif.title')</h3>
        </header>
        @foreach($toverifQuotes as $quote) 
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
    @endif





    <article id="philo-quotes">
        <header>
            <h3>@lang('content.home.philo.title') - <a href="{{route('quote.index')}}">@lang('content.home.philo.more')</a></h3>
        </header>
        @foreach($philoQuotes as $quote) 
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



    <article id="latest-quotes">
        <header>
            <h3>@lang('content.home.latest.title') - <a href="{{route('quote.index')}}">@lang('content.home.latest.more')</a></h3>
        </header>
        @foreach($lastQuotes as $quote) 
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


    <!-- <article id="popular-quotes">
        <header>
            <h3>@lang('content.home.popular.title') - <a href="{{route('quote.index', ['order'=>'popularity'])}}">@lang('content.home.popular.more')</a></h3>
        </header>
        @foreach($popularQuotes as $quote) 
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
    </article> -->

    </div>
</main>
@endsection
