<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Support\Facades\Storage;

use App\Traits\HasFeaturedImage;

class Article extends Model implements Viewable
{
    use InteractsWithViews, HasFeaturedImage;

    protected $fillable = [
        'content', 'title', 'user_id', 'featured_image'
    ];

    protected $with = [
        'categories',
        'user'
    ];

    /**
     * To automatically delete all views of an viewable Eloquent model on delete, 
     * you can enable it by setting the removeViewsOnDelete property to true in your model definition.
     *
     * @var boolean
     */
    protected $removeViewsOnDelete = true;

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

    public function getFeaturedImageAttribute($value)
    {
        return $value ? Storage::disk('public')->url($value) : null;
    }

    public static function getHomeArticles(int $take = 3)
    {
        return static::take($take)->latest()->get();
    }
}
