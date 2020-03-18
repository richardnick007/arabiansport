<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Post;
use App\Comment;
use App\Like;
use App\Saved;

class SavedsController extends Controller
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
     * Display all saved posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $post_ids = Saved::where('user_id', '=', $user_id)
        ->orderBy('created_at','desc')
        ->get('post_id');
        //  dd($post_ids);
         $posts = Post::whereIn('post_id',$post_ids)
        // ->withCount('comments')
        // ->withCount('likes')
        // ->with('user')
         ->get();
        //  dd($posts);
         
         return view('post.savedpost', compact('posts'));
    }

    /**
     * Save posts to saveds table 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saved(Request $request, $post_id)
    {
        $request->all();

            Saved::where('post_id', '=', $post_id)
            ->where('user_id', '=', Auth::user()->id)
            ->delete();

            Saved::create([
                'post_id'=> $post_id,
                'user_id'=>Auth::user()->id
            ]);
    
            return redirect()->back()->with('meassage','Post sucsessfuly saved');
    }
}
