<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =[
        'articles_id',
        'users_id',
        'content'

    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id');

    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    }
