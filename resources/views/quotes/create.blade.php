@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Nouvelle citation")
@section('content')
<main>
    <h2>@lang('content.add.title')</h2>

    <form id="create-quote" action="{{ route('quote.store') }}" method="POST">
        @csrf
        <label>
            @lang('content.add.labels.group')
            <select name="group" id="group">
                <option value="none">@lang('content.add.inputs.none')</option>
                @foreach($groups as $group)
                <option value="{{$group->uuid}}" @if($group->uuid == old('content')) selected @endif>{{$group->name}}</option>
                @endforeach
            </select>
            @error('group')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </label>
        

        <label>
            @lang('content.add.labels.content')
            <textarea name="content" id="content" value="" placeholder="@lang('content.add.inputs.content')">{{ old('content') }}</textarea>
            @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </label>
        
        
        <label>
            @lang('content.add.labels.author')
            <input name="author" id="author" value="{{ old('author') }}" placeholder="@lang('content.add.inputs.author')">
            @error('author')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            <input type="submit" value="@lang('content.add.inputs.submit')">
        </label>
    </form>
</main>
@endsection
