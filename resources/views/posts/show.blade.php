@extends('layouts.app')
<style>
    .center {
    margin-left: auto;
    margin-right: auto;
    display: block
}
</style>
@section('content')
<main role="main" class="flex-shrink-0">
<div class="container">
    <a href='/posts' class="btn btn-secondary">Go Back</a>
    <h2>{{$post->title}}</h2>
    <br>
    <video width="765" height="485" class="center" controls >
        <source src="/storage/videos/{{$post->video}}" type="video/mp4">
    </video>
    <br>
    <p class="lead">{!!$post->description!!}</p>
    <br/>
    <label for="input-1-sm" class="control-label">Rating:</label>
    <input id="input-1-sm" name="rating" class="rating rating-loading" value="{{$post->rating}}" data-size="xs">
    
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest() && Auth::user()->id == $post->user_id)
        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
    @endif
</div>
    <script>
        $(document).on('ready', function(){
            $('#input-1-sm').rating({displayOnly: true, step: 0.5});
        });
    </script>
</main>
@endsection