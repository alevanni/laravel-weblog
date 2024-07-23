<div class="card">
    <a href="">Edit article</a>
    <form action="{{ route('articles.destroy', [$user->id, $article->id]) }}" method="POST">
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
</div>