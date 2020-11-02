<?php

namespace App\Models;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'birthday',
        'gender',
    ];

    protected $dates = [
        'birthday'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }
}
