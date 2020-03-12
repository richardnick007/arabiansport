<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id'
    ];

     // get user that owns the post
     function user(){
        return $this->belongsTo('App\User');
    }

    // get comments for this post
    function post(){
        return $this->belongsTo('App\Post', 'post_id', 'post_id');
    }
}
