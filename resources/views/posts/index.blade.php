@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-8">
            <strong>User Post Table</strong>
        </div>
        <div class="col-sm-2">
            @if(\Session::has('post_count'))
                <h6 class="float-right">Total Records - {{Session::get('post_count')}}</h6>
            @endif
        </div>
        <div class="col-sm-2">
                <a href="{{route('create-post')}}" class="btn btn-info float-right">Add Post</a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <table class="table table-bordered posts_table" id="myTable">
                <thead>
                    <th>Sr. No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($posts as $key => $post)
                        <tr post-id="{{$post->id}}" id="row_{{$post->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{ucfirst($post->title)}}</td>
                            <td>{{ucfirst($post->description)}}</td>
                            <td>
                                <button type="button" class="btn btn-success editBtn" style="padding:5px 20px 5px 20px;margin-bottom: 10px;" data-toggle="modal" data-target="#editModal">Edit</button>

                                <form method="POST" action="{{route('posts-destroy',$post->id)}}">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Your Posts</h4>
                    </div>
                    <form action="" id="PostsValidation" method="POST">
                        <div class="modal-body">    
                            @csrf 
                            <input type="hidden" id="pid" name="postId">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" id="title" name="postTitle">
                            
                            </div>
                            <div class="form-group">
                                <label for="PostDescription">Post Description</label>
                                <textarea class="form-control" id="description" name="postDescription"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-info" name="submit" id="updatePost" value="Update">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>   
            </div>
        </div>


    </div>     

@endsection
