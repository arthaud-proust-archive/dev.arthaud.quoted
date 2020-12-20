@extends('layouts.app')

@section('content')
<main>
    <!-- <h1 id="hero">@lang('content.auth.title.register')</h1> -->
    <h2 >@lang('content.auth.title.register')</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>
            @lang('content.auth.fields.name')
            <input id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </label>

        <label>
            @lang('content.auth.fields.email')
            <input id="email" type="email"  name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </label>

        <label>
            @lang('content.auth.fields.password')
            <input id="password" type="password"  name="password" value="{{ old('password') }}" required>
            @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </label>

        <label>
            @lang('content.auth.fields.rpassword')
            <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </label>


        <button type="submit" class="btn btn-primary">
            @lang('content.auth.register')
        </button>

        <a href="{{ route('login') }}">
            @lang('content.auth.links.login')
        </a>
    </form>
</main>
@endsection
