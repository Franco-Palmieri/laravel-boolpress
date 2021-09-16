@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
            <div class="blog-container card-deck col-6 col-md-3">
                <div class="card">
                    <a href="{{route('posts.show', $post->id)}}"><img class="card-img-top" src="{{$post->image}}" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <p class="card-text">{{$post->body}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection