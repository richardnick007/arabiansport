<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;

class CommentsController extends Controller
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
    public function index($type, $post_id)
    {
        $comments = comment::where('type',$type)
        ->where('post_id', $post_id)->with('user')
        ->get();
        // dd($comments);
        return view('comments.commentview', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $post_id)
    {
        return view('comments.newcomment', compact('type','post_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $type = $data['type'];
        if($type = 1){
            $request->validate([
                'comment'=>'min:10'
                ]); 
             }

            Comment::create([
                'comment'=>$data['comment'],
                'type'=>$type,
                'post_id'=> $data['post_id'],
                'user_id'=>Auth::user()->id
            ]);
    
            return redirect('commentview')->with('meassage','Comment sucsessfuly uploaded');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $post_id)
    {

            Comment::create([
                'comment'=>'',
                'type'=> 0,
                'post_id'=> $post_id,
                'user_id'=>Auth::user()->id
            ]);
    
            return redirect()->back()->with('meassage','Comment sucsessfuly uploaded');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
