@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

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
