@extends('layouts.app')


@section('content')

<h1>Edit Post</h1>
{!! Form::model($post, ['method'=>'patch', 'action'=>['NewPostController@update', $post->id]]) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('title', 'Post Title') !!}
        {!! Form::text('title', null, ['class'=> 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Post Content') !!}
        {!! Form::text('content', null, ['class'=> 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}

{!! Form::model($post, ['method'=>'delete', 'action'=>['NewPostController@destroy', $post->id]]) !!}
    @csrf
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class'=>'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}

@section('footer')

@endsection

