<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Post;
use App\Comment;
use App\Like;

class LikesController extends Controller
{
    /**
     * Save like to DB
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $post_id)
    {
            Like::create([
                'post_id'=> $post_id,
                'user_id'=>Auth::user()->id
            ]);
    
            return redirect()->back()->with('meassage','Comment sucsessfuly uploaded');
    }
}
