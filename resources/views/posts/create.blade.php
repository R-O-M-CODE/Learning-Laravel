@extends('layouts.app')


@section('content')

<h1>Create Post</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'NewPostController@store']) !!}
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
    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
</div>


{!! Form::close() !!}

@section('footer')

@endsection
