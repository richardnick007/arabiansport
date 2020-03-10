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
                        {{$post->post}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">comment</div>
                    <div class="col-md-3">no of Comment</div>
                    <div class="col-md-3">like</div>
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
