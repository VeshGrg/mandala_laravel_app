<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Events\NewCommentCreated;
use App\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->authorizeResource(Comment::class, 'comment');
    }

    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create([
            'article_id' => $request->article_id,
            'user_id'    => auth()->id(),
            'content'    => $request->content
        ]);

        return response()->json(
            view('partials.comment', compact('comment'))->render()
        );
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
