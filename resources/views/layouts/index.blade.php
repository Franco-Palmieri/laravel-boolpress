@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($allPosts as $post)
            <div class="col-3 post-container">
                {{$post->name}}
                <div class="row">
                    <div class="image-box">
                        <img src="{{$post->image}}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection