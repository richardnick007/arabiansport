@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post</div>

                <div class="card-body">



                    <form method="POST" enctype="multipart/form-data" action="{{ route('store') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Caption</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="caption">
                            </div>
                            @error('caption')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Post Body</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="post"></textarea>
                            </div>
                            @error('post')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                            <input type="file" class="form-control" name="picture" >
                            </div>
                            @error('picture')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                                {{-- <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}"> --}}
                        
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
