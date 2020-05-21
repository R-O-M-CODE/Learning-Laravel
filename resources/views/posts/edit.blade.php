@extends('layouts.app')


@section('content')

<h1>Edit Post</h1>
<form method="POST" action="/post/{{$post->id}}">
    @csrf

    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" value="{{$post->title}}" placeholder="Enter Title"><br/>
    <input type="text" name="content" value="{{$post->content}}" placeholder="Enter Content"><br/>
    <input type="submit" name="Update" value="Update">
</form>
<form method="POST" action="/post/{{$post->id}}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" name="delete" value="Delete">
</form>
@section('footer')

@endsection

