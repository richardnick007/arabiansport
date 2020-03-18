@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make Your Comment</div>

                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('commentstore') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Comment</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="comment"></textarea>
                            </div>
                            @error('comment')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                                <input type="hidden" class="form-control" name="type" value="{{$type}}">
                                <input type="hidden" class="form-control" name="post_id" value="{{$post_id}}">
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
