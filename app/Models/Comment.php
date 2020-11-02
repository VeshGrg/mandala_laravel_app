<?php

namespace App\Models;

class Comment extends Model
{
    protected $fillable = [
        'article_id',
        'user_id',
        'content'
    ];

    protected $with = [
        'user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
