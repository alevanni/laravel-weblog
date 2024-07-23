@extends('layouts.app')

@section('title', 'Log In')

@section('content')
<h1>Log In</h1>

<form action="{{route('articles.login')}}" method="POST">
@csrf
<label for="username">Username:</label>
    <input type="text" id="username" name="username" value="{{ old('username') }}" required>
<br>
<label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
<br>
@if (session('errors') != null)
<p class="error">{{ session('errors')->first('message')}} </p>
@endif
<button type="submit">Submit</button>
</form>
@endsection