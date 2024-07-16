<div class="comment">
    <p class="comment-author">{{ $users->where('id', $comment->user_id)->first()->name }}:</p><p>{{$comment->body}}</p>
</div>