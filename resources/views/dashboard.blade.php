@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            {{$posts->count()}}
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts)>0)
                    <table class="table table striped">
                        <tr>
                            <td>Title</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">EDIT</a></td>
                            <td> 
                            {!!Form::open(['action' =>['PostsController@destroy', $post->id], 'method' =>'POST', 'class'=>'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You have no Posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
