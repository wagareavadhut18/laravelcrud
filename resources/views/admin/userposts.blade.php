@extends('layouts.app')
@section('content')
<center>
    <h1>User Posts</h1>
</center>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <th>Sr. No.</th>
            <th>Post Title</th>
            <th>Post Description</th>
        </thead>
        <tbody>
            @foreach($userposts as $key => $userpost)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{ucfirst($userpost->title)}}</td>
                <td>{{ucfirst($userpost->description)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
