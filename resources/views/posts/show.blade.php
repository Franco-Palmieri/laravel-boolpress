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
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->name}}</td>
                    <td>{{$post->body}}</td>
                    <td><img src="{{$post->image}}" alt=""></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection