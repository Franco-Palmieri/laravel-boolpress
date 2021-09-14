@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Body</th>
                    <th scope="col">Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->name}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->date}}</td>
                    <td><img src="{{$post->image}}" alt=""></td>
                    <td><a href="{{route('posts.show', ['post' => $post->id])}}"><i class="bi bi-arrow-right-square-fill"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection