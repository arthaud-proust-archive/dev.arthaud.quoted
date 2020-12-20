@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "About")
@section('content')
<main>
<h2 >@lang('content.auth.title.edit')</h2>

<form method="POST" action="{{ route('user.update') }}">
    @csrf

    <label>
        @lang('content.auth.fields.name')
        <input id="name" name="name" value="{{ old('name')?old('name'):$user->name }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </label>

    <label>
        @lang('content.auth.fields.email')
        <input id="email" type="email"  name="email" value="{{ old('email')?old('email'):$user->email }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </label>

    <a href="{{ route('password.request') }}">
        @lang('content.auth.links.passwordchange')
    </a>

    <button type="submit" class="btn btn-primary">
        @lang('content.auth.save')
    </button>

    </form>
</main>
@endsection