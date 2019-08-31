@extends('layouts.app')
@section('content')
<div class="container">
    <!-- <p>{{$users}}</p> -->
    <table class="table table-bordered" id="UsersTable">
        <thead>
            <th>Sr. No.</th>
            <th>Username</th>
            <th>Email Id</th>
            <th>Role</th>
            <th>Banned</th>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            @if(($user->role)!='admin')
            <tr>
                <td>{{$key+1}}</td>
                <td><a href="{{ route('get-userposts',$user->id) }}">{{ucfirst($user->name)}}</a></td>
                <td>{{ucfirst($user->email)}}</td>
                <td>{{ucfirst($user->role)}}</td>
                <td>{{($user->baned)}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
