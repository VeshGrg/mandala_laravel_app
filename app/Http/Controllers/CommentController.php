<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'content'    => 'required'
        ]);

        Comment::create([
            'article_id' => $request->article_id,
            'user_id'    => auth()->id(),
            'content'    => $request->content
        ]);

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
