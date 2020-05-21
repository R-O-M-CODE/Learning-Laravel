@extends('layouts.app')


@section('content')

<h1>Create Post</h1>
<form method="POST" action="/post">
    @csrf
    <input type="text" name="title" placeholder="Enter Title"><br/>
    <input type="text" name="content" placeholder="Enter Content"><br/>
    <input type="submit" name="submit">
</form>

@section('footer')

@endsection

