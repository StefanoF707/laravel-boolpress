@extends('layouts.main')

@section('header')
    <h1>Tutti i post</h1>
@endsection

@section('content')
    <div class="wrapper-cards">

        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->author }}</h6>
                    <p class="card-text">{{ substr($post->body, 0, 100) . '...' }}</p>
                    <p class="text-muted">commenti: {{ count($post->comments) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary text-uppercase">info</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
