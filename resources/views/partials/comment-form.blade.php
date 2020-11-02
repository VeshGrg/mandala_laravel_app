<form id="comment-form" action="{{ route('comments.store') }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article->id }}">

    <div class="form-group">
        <label for="">Leave a comment.</label>
        <textarea class="form-control"
            placeholder="Type your comment here"
            name="content"
            id="content" required></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Comment</button>
    </div>
</form>