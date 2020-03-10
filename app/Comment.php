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
        'comment'
    ];

     // get user that owns the post
     function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    // get comments for this post
    function posts(){
        return $this->hasMany('App\comment', 'post_id');
    }
}
