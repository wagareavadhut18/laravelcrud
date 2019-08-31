@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">User Profile</div>
					<div class="card-body">
				        <form method="POST" action="{{route('username-update')}}">
				        	@csrf
				        	<div class="form-group row">
			                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

			                    <div class="col-md-6">
			                        <input id="uname" type="text" class="form-control" name="username" value="{{$username}}"required>
			                    </div>
			                </div>
			                <div class="form-group row">
			                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

			                    <div class="col-md-6">
			                        <input id="email" type="email" class="form-control" name="useremail" value="{{$useremail}}" disabled>
			                    </div>
			                </div>
			                <div class="form-group row mb-0">
			                    <div class="col-md-6 offset-md-4">
			                        <button type="submit" class="btn btn-primary">Submit</button>
			                    </div>
			                </div>
				        </form>
				    </div>
			    </div>
		    </div>
	    </div>
    </div>


@endsection