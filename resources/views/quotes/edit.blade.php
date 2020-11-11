@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Edition")
@section('content')
<main>
    <h2>Edit a quote</h2>

    <form id="edit-quote" action="{{ route('quote.update', $quote->uuid) }}" method="POST">
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
            <input name="content" id="content" value="{{ old('content')? old('content'):$quote->content }}" placeholder="I have a quote">
            @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </label>
        
        
        <label>
            Author
            <input name="author" id="author" value="{{ old('author')? old('author'):$quote->author }}" placeholder="Martin Luther King">
            @error('author')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            <input type="submit" value="Save changes">
        </label>
        
    </form>

    <form id="delete-quote" action="{{ route('quote.destroy', $quote->uuid) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
</main>
@endsection