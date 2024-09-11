
@extends('layouts.app')

@section('title', 'Premium Content')

@section('content')
<h1>Premium Articles</h1>
@foreach ($articles as $article)
  @include('partials.card', ['article' => $article])
@endforeach

@endsection