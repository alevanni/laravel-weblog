@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<h1>Edit your article</h1>
<form action="{{ route('articles.users.update', [$user->id, $article->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $article->title}}" required>
    <br>
    <label for="body">Write your article here:</label>
    <textarea id="body" name="body" rows="40" cols="50" >{{ $article->body}}</textarea>
    <br>
    <label for="premium">Premium</label>
    <input type="checkbox" id="premium" name="premium"  value='1'
         @if ( $article->premium == '1' ) checked ='checked' : null @endif 
    />

    <br>
    @include('partials.categories')
    <br>
    <button type="submit">Submit</button>
</form>
@endsection