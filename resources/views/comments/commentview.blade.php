@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Comment view</div>

                @foreach($comments as $key=>$comment)

                <div class="row ">
                    <div class="col-md-4">
                        {{$comment->user->name}}
                    </div>    
                    <div class="col-md-6">
                        {{$comment->comment}}
                    </div>
                </div>
                
                   <hr/>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
