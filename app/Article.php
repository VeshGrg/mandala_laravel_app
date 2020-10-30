<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'content', 'title', 'user_id',
    ];
    ///public function articles(){
    /// return $this->hasOne(Article::class);
public function user(){
    return $this->belongsTo(User::class,'id');

}
public function categories()
{
    return $this->belongsToMany(Category::class,  'article_category' ,
    'article_id',
    'category_id');
}

    public function comments(){
        return $this->hasMany(Comment::class,'articles_id');
    }

}
