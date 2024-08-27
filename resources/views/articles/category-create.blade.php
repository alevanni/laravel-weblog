@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<h2>Create a new category:</h2>
<form action="{{ route('categories.store') }}" method="POST">
     @csrf
     <input type="text" id="category" name="name" required>
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