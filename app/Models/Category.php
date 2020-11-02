<?php

namespace App\Models;

class Category extends Model
{
    protected $fillable = [
        'title'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
