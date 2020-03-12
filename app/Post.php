<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'caption', 'post', 'picture', 'user_id',
    ];

     // get user that owns the post
     function user(){
        return $this->belongsTo('App\User');
    }

    // get comments for this post
    function comments(){
        // return $this->hasMany('App\comment', 'post_id');
        return $this->hasMany('App\Comment', 'post_id', 'post_id');
    }

    function likes(){
        // return $this->hasMany('App\comment', 'post_id');
        return $this->hasMany('App\Like', 'post_id', 'post_id');
    }
}
