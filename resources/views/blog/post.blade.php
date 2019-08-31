@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card mb-3">
					<div class="card-header">{{ucfirst($singlepost->title)}}</div>
					<div class="card-body">
						{{ucfirst($singlepost->description)}}
					</div>
					<div class="card-footer">
						Auther : {{ucwords($singlepost->user->name)}}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection