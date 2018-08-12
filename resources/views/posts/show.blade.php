 @extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default">GO back</a>
	<h1>{{$post->title}}</h1>
	<div class="col-md-4 col-sm-4">
			<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
			<br>
			<br>
	<div>
	{{$post->body}}
	</div>
	<hr>
	@if(!Auth::guest())
		@if(Auth::user()->id ==$post->user_id)
	<small>Written on {{$post->created_at}}</small>
	<hr>
	<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

	{!!Form::open(['action' =>['PostsController@destroy', $post->id], 'method' =>'POST', 'class'=>'pull-right'])!!}
		{{Form::hidden('_method', 'DELETE')}}
		{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
	{!!Form::close() !!}
		@endif
	@endif
@endsection 