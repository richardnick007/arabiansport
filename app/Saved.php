<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id'
    ];

     // get user that owns the saved post
     function user(){
        return $this->belongsTo('App\User');
    }

    // get post that is saved
    function post(){
        return $this->belongsTo('App\Post', 'post_id', 'post_id');
    }
}
