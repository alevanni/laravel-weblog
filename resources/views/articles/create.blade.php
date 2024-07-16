@extends('layouts.app')

@section('title', 'New Article')

@section('content')
<h1>Write a new article</h1>
<form action="{{ route('articles.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="body">Write your article here:</label>
    <textarea id="body" name="body" rows="40" cols="50"></textarea>
    <br>
    <label for="premium">Premium</label>
    <input type="checkbox" id="premium" name="premium" value="1" />
    <br>
    <button type="submit">Submit</button>
</form>
@endsection