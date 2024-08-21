



@extends('layouts.app')

@section('title', $article->title )

@section('content')
@if ($article->premium)
     <p class='badge premium'>Premium content</p>
@else
     <p class='badge free'>Free content</p>
@endif
@include('partials.categories-badges')
<h1> {{$article->title}}</h1>
<h2>Written by: {{$article->user->username}}</h2>
<p class="article-date">{{$article->created_at}}</p>
<p class="article-text">{{$article->body}}</p>
<h2>Comments: </h2>
@foreach ($comments as $comment)
  @include('partials.comment', ['comment' => $comment])
@endforeach
@include('partials.create-comment')
@endsection