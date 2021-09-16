@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="col-12">BOOLPRESS BLOG</h1>
        @foreach($posts as $post)
            <div class="card-blog col-3">
                <div class="card-content">
                    <a href="{{route('posts.show',['post' => $post->id])}}">
                        <img src="{{$post->image}}" alt="">
                    </a>
                    <div class="name"><h3>{{$post->name}}</h3></div>
                    <p>{{$post->body}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection