@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class = 'form-group'>
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class = 'form-group'>
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class = 'form-group'>
                {{Form::label('rating', 'Rating')}}
                {{Form::text('rating', '', ['class' => 'rating rating-loading', 'id' => 'input-1-sm', 'placeholder' => 'Rating'])}}
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
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
