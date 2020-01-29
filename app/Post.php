<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'poster', 'body'
    ];
    public function user()
    {

        return $this->belongsTo('App\User', 'poster', 'id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function likeIt($id)
    {
        $likers = [];

        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        return in_array($id, $likers);
    }

    // public function isLiked()
    // {
    //     return $this->likes()->count() > 0;
    // }
}
