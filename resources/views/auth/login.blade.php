@extends('layouts.app')

@section('content')
<main>
    <!-- <h1 id="hero">@lang('content.auth.title.login')</h1> -->
    <h2 >@lang('content.auth.title.login')</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label>
            @lang('content.auth.fields.email')
            <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="new-password">
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
            <span class="no-select" style="display: flex; flex-direction:row; width: 100%; justify-content:flex-start">
                <span style="white-space: nowrap;">@lang('content.auth.fields.remember')</span>
                <input style="width: 40px;min-width: 0; display: inline-block" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            </span>
        </label>

        <button type="submit">
            @lang('content.auth.login')
        </button>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                @lang('content.auth.links.forget')
            </a>
        @endif
        <a href="{{ route('register') }}">
            @lang('content.auth.links.register')
        </a>
    </form>
</main>
@endsection
