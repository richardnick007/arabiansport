<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'post_id', 'user_id', 'type'
    ];

     // get user that owns the post
     function user(){
        return $this->belongsTo('App\User');
    }

    // get comments for this post
    function postt(){
        return $this->belongsTo('App\Post', 'post_id', 'post_id');
    }
}
