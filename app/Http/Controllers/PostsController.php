<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Post;
use App\Comment;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')
        ->withCount('comments')
        ->withCount('likes')
        ->with('user')
        ->get();
        return view('post.postview', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.newpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'caption'=>'required',
        'post'=>'required|min:10',
        'picture'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // 'user_id'=>'required|numeric'
        ]);
        $data=$request->all();
        
        $filePath = "";

        if($files = $request->file('picture')){
            $destinationPath = 'public/image/'; // upload path
            $Image = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $Image);
            $filePath = $destinationPath.$Image;
        }
        
        Post::create([
            'caption'=>$data['caption'],
            'post'=>$data['post'],
            'picture'=> $filePath,
            'user_id'=>Auth::user()->id
        ]);

        return redirect('postview')->with('meassage','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::find($post_id);
        //   ->withCount('comments')
        //   ->withCount('likes')
        //   ->with('user')
        //    ->get();
        //     dd($post);
        return view('post.post', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
