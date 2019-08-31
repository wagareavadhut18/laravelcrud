@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				@foreach($posts as $post)
				<div class="card mb-3">
					<div class="card-header">{{ucfirst($post->title)}}</div>
						<div class="card-body">
							@if(strlen($post->description) > 150)
							
								{{ucfirst(substr($post->description,0,100))}}...<a href="{{route('blog-post',$post->id)}}">ReadMore</a>

							@else
							
								{{$post->description}}
							
							@endif
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection