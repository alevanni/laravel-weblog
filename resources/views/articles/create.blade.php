@extends('layouts.app')

@section('title', 'New Article')

@section('content')
<h1>Write a new article</h1>
<form action="{{ route('articles.store') }}"  method="POST" enctype="multipart/form-data">
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
    <label for="image">Add an image</label>
    <input type="file" id="image" name="image"  />
    <br>
    @include('partials.categories')
    <br>
    <button type="submit">Submit</button>
    @if ($errors->any())
    <div >
        <ul class="validation-errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</form>
@endsection