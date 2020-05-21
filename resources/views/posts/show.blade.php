@extends('layouts.app')


@section('content')

    <h1>{{$post->title}}</h1>

<a href="{{route('post.edit', $post->id)}}">Edit Post</a>
@section('footer')
@endsection
