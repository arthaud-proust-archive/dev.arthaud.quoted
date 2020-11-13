@extends('layouts.app', ['requirementsJs' => ['app']])

@section('title', "Edition")
@section('content')
<main>
    <h2>@lang('content.edit.title')</h2>

    <form id="edit-quote" action="{{ route('quote.update', ['lang'=>App::getLocale(), 'uuid'=>$quote->uuid]) }}" method="POST">
        @csrf
        <label>
            @lang('content.edit.labels.group')
            <select name="group" id="group">
                <option value="none">@lang('content.edit.inputs.none')</option>
                @foreach($groups as $group)
                <option value="{{$group->uuid}}" @if($group->uuid == old('content')) selected @endif>{{$group->name}}</option>
                @endforeach
            </select>
            @error('group')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </label>
        

        <label>
            @lang('content.edit.labels.content')
            <input name="content" id="content" value="{{ old('content')? old('content'):$quote->content }}" placeholder="@lang('content.edit.inputs.content')">
            @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </label>
        
        
        <label>
            @lang('content.edit.labels.author')
            <input name="author" id="author" value="{{ old('author')? old('author'):$quote->author }}" placeholder="@lang('content.edit.inputs.author')">
            @error('author')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            <input type="submit" value="@lang('content.edit.inputs.submit')">
        </label>
        
    </form>

    <form id="delete-quote" action="{{ route('quote.destroy', ['lang'=>App::getLocale(), 'uuid'=>$quote->uuid]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="@lang('content.edit.inputs.delete')">
    </form>
</main>
@endsection
