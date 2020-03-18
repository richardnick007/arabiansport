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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Save like to DB
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $post_id)
    {
        $liked = Like::where('post_id', '=', $post_id)
                ->where('user_id', '=', Auth::user()->id)->exists();
        
        if ($liked) {
            Like::where('post_id', '=', $post_id)
            ->where('user_id', '=', Auth::user()->id)->delete();
        } else {
            Like::create([
                'post_id'=> $post_id,
                'user_id'=>Auth::user()->id
            ]);
        }
    
        return redirect()->back()->with('meassage','Comment sucsessfuly uploaded');
    }
}
