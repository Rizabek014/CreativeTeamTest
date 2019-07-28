@extends('layouts.app')

@section('content')
  <main role="main" >
    <div class="album py-5 bg-light">
      <div class="container">
        <h1>Posts</h1>
        <div class = "row">
        @if(count($posts)>0)
          @foreach ($posts as $item)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="bd-placeholder-img card-img-top" width="100%" height="225" 
                     xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" 
                     src="/storage/cover_images/{{$item->cover_image}}">
                <div class="card-body">
                  <h3 class="card-text"><a href="/posts/{{$item->id}}">{{$item->title}}</a></h3>
                  <p class="card-text">{!!$item->description!!}</p>
                  <input id="input-1-xs" name="rating" class="rating rating-loading" value="{{$item->rating}}" data-size="xs">
                  <div class="d-flex justify-content-between align-items-right">
                    <small class="text-muted">Written on {{$item->created_at}} by {{$item->user->name}}</small>
                  </div>    
                </div>     
              </div>
            </div>
          @endforeach
        
        @else 
            <p>No post found</p>
        @endif
        </div>
        {{$posts->links()}}
      </div>
    </div>
  </main>
@endsection