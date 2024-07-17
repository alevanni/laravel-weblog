<h2>Post a new comment:</h2>
<form action="{{ route('comments.store', $article->id) }}" method="POST">
     @csrf
     <input type="text" id="comment" name="body" required>
     <br>
     <button type="submit">Submit</button>
</form>