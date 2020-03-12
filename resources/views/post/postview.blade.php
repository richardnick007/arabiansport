@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post view</div>

                @foreach($posts as $key=>$post)
                <div class="row ">
                    <div class="col-md-4">
                        <img src="{{$post->picture}}" alt="Post picture unavaliable" width="100%"/>
                    </div>    
                    <div class="col-md-6">
                        <h3>{{$post->caption}}</h3>
                        <h5>by {{$post->user->name}}</h5>
                        {{$post->post}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a class="navbar-brand" href="commentview/1/{{$post->post_id}}">
                        {{$post->comments_count}}
                        </a> 
                        <a class="navbar-brand" href="newcomment/1/{{$post->post_id}}">
                            comment
                        </a> 
                    </div>
                    <div class="col-md-3">no of Comment</div>
                    <div class="col-md-3">
                        
                        <a class="navbar-brand" href="like/{{$post->post_id}}">
                            like
                        </a>
                    </div>
                    <div class="col-md-3">No of Likes</div>
                </div>
                   <hr/>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
