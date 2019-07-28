@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class = 'form-group'>
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class = 'form-group'>
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', $post->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class = 'form-group'>
                {{Form::label('rating', 'Rating')}}
                {{Form::text('rating', $post->rating, ['class' => 'form-control', 'placeholder' => 'Rating'])}}
        </div>
        <div class="form-group">
                {{Form::label('cover_image', 'Cover Image')}}
                <br>
                {{Form::file('cover_image')}}
            </div>
            <div class="form-group">
                    {{Form::label('video', 'Video')}}
                    <br>
                    {{Form::file('video')}}
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection