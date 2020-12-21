@extends('layouts.app', ['requirementsJs' => ['app']])


@section('content')
<main>
    <h2 >@lang('content.auth.title.update')</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

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
            @error('password-confirm')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </label>

        <button type="submit" class="btn btn-primary">
            @lang('content.auth.save')
        </button>
    </form>
</main>
@endsection
