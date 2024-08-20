<div class="card">
   <h2>{{ $article->title }}</h2>
   <h4>Written by {{ $article->user->username }}</h4>
   <p>{{ $article->created_at }}</p>
   <p>{{  Str::limit($article->body, 40) }} <a href="{{ route('articles.show', $article->id)}}">Read more... </a></p>
   @if ($article->premium)
     <p class='badge premium'>Premium content</p>
   @else
     <p class='badge free'>Free content</p>
   @endif
   @foreach ($article->categories as $category)
   <span class='badge '>{{$category->name}}</span>
   @endforeach
</div>