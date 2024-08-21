

@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
<h1>Articles</h1>
@include('partials.filter')
@foreach ($articles as $article)
  @include('partials.card', ['article' => $article])
@endforeach
@endsection


    
