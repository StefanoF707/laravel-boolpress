@extends('layouts.main')

@section('header')
    <h1>Tutti i post</h1>
@endsection

@section('content')
    <div class="wrapper-cards">

        @foreach ($posts as $post)
            <div class="card">
                <img class="card-img-top" src="{{$post->img_path != '' ? $post->img_path : asset('img/img-not.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->author }}</h6>
                    @foreach ($post->tags as $tag)
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    @endforeach
                    <p class="card-text">{{ substr($post->body, 0, 100) . '...' }}</p>
                    <p class="text-muted">commenti: {{ count($post->comments) }}</p>
                    <a href="{{ route('blog.article', $post->slug) }}" class="btn btn-primary text-uppercase">info</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
