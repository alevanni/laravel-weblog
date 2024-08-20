@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<h2>Create a new category:</h2>
<form action="{{ route('categories.store') }}" method="POST">
     @csrf
     <input type="text" id="category" name="name" required>
     <br>
     <button type="submit">Submit</button>
</form>

@endsection