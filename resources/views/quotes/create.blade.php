@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "New quote")
@section('content')
<main>
    <h2>Add a quote</h2>

    <form id="create-quote" action="{{ route('quote.store') }}" method="POST">
        @csrf
        <label>
            Group
            <select name="group" id="group">
                <option value="none">None</option>
                @foreach($groups as $group)
                <option value="{{$group->$uuid}}" @if($group->uuid == old('content')) selected @endif>{{$group->name}}</option>
                @endforeach
            </select>
            @error('group')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </label>
        

        <label>
            Content
            <input name="content" id="content" value="{{ old('content') }}" placeholder="I have a quote">
            @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </label>
        
        
        <label>
            Author
            <input name="author" id="author" value="{{ old('author') }}" placeholder="Martin Luther King">
            @error('author')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            <input type="submit" value="Add the quote">
        </label>
    </form>
</main>
@endsection