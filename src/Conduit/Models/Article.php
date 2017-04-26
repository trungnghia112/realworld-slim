<?php

namespace Conduit\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'description',
        'slug',
        'title',
        'body',
        'tagList',
        'favoritesCount',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}