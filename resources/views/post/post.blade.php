@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post view</div>

                    <div class="row ">
                        <div class="col-md-4">
                            <img src="{{ asset($post->picture)}}" alt="Post picture unavaliable" width="100%"/>
                        </div>    
                        <div class="col-md-6">
                            <h3>{{$post->caption}}</h3>
                            <h5>by {{$post->user->name}}</h5>
                            {{ $post->post }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-md-3">
                            <a class="navbar-brand" href="commentview/1/{{$post->post_id}}">
                            {{$post->comments_count}}
                            </a> 
                            <a class="navbar-brand" href="newcomment/1/{{$post->post_id}}">
                                comment
                            </a> 
                        </div>

                        <div class="col-md-2">
                            <a class="navbar-brand" href="{{route('save', $post->post_id)}}">
                                save
                            </a> 
                        </div>

                        <div class="col-md-1">
                            <a class="navbar-brand" href="{{route('like', $post->post_id)}}">
                                {{$post->likes_count}} like
                            </a>
                        </div>
                        
                        <div class="col-md-3">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox_sw0p"></div>
                        </div>

                        <div class="col-md-1"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('share')
  <!-- Go to www.addthis.com/dashboard to customize your tools --> 
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e6b421e9394db7c"></script>  
@endsection
