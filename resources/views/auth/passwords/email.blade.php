@extends('layouts.app')

@section('content')
<main>
    <h2 >@lang('content.auth.title.reset')</h2>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label>
            @lang('content.auth.fields.email')
            <input id="email" type="email"  name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </label>

        <button type="submit" class="btn btn-primary">
            @lang('content.auth.reset')
        </button>

        <a href="{{ route('login') }}">
            @lang('content.auth.links.cancel')
        </a>
    </form>
</main>
@endsection
