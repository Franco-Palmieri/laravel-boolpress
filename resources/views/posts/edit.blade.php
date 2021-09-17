@extends('layouts.app')


@section('content')

@include('layouts.nav')

<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('posts.update', $post)}}" method="post">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$post->name}}">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <input type="text" name="body" class="form-control" id="body" value="{{$post->body}}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="body" value="{{$post->image}}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection