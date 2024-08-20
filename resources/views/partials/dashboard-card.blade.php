<div class="card">
    <a href="{{ route('articles.show', $article->id)}}">Read the article</a>
    <a href="{{route('articles.users.edit', [$user->id, $article->id])}}">Edit article</a>
    <form action="{{ route('articles.users.destroy', [$user->id, $article->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
   <h2>{{ $article->title }}</h2>
   <p>{{ $article->created_at }}</p>
   @if ($article->premium)
     <p class='badge premium'>Premium content</p>
   @else
     <p class='badge free'>Free content</p>
   @endif
   @foreach ($article->categories as $category)
   <span class='badge '>{{$category->name}}</span>
   @endforeach
</div>

