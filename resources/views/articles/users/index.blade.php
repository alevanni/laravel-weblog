{{-- THIS FILE SHOULD BE REMOVED --}}

@extends('layouts.app')

@section('title', $user->username)

@section('content')
<h1>Articles </h1>
@foreach ($articles as $article)
  @include('partials.dashboard-card', ['article' => $article])
@endforeach

@endsection