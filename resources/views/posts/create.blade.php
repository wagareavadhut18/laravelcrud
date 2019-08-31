@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card mb-3">
                  <div class="card-header">Add Posts Here</div>
                    <div class="card-body">
                        <form action="{{route('posts-store')}}" method="POST">
                          @csrf
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control @error('postTitle') is-invalid @enderror" id="title" name="postTitle" placeholder="Enter Post Title">
                                @error('postTitle')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="PostDescription">Post Description</label>
                                <textarea class="form-control @error('postDescription') is-invalid @enderror" id="description" name="postDescription" placeholder="Enter Post Description"></textarea>
                                @error('postDescription')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-info" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection