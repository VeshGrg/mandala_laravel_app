<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'content', 'title', 'user_id',
    ];

    protected $with = [
        'categories'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function getHomeArticles(int $take = 3)
    {
        return static::take($take)->latest()->get();
    }
}
