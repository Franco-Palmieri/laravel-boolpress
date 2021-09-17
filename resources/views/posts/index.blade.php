@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
            <div class="blog-container card-deck col-6 col-md-3">
                <div class="card">
                    <div class="options">
                        <a href="{{route('posts.edit', $post->id)}}">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                        </a>
                        <form action="{{route('posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-x"></i></button>
                        </form>
                    </div>
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