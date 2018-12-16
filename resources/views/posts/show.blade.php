@extends('layouts.app')
@section('content')
<a href="{{url('/posts')}}" class="btn btn-primary btn-lg">Go back</a> 
<h1>{{$post->title}}</h1>
<div>
    <h2>{{$post->body}}</h2>
</div>
<hr>
<small>Written on {{$post->created_at}}</small>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id==$post->user_id)
<a href="{{url('/posts')}}/{{$post->id}}/edit" class="btn btn-default">Edit</a>
{!! Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif
@endsection