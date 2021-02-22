@extends('layouts.main')

@section('header')
    <h1>pagina articolo: {{ $post->id }}</h1>
@endsection

@section('content')
    <h2>{{ $post->title }}</h2>
    <h4 class="text-muted">{{ $post->author }}</h4>
    <p class="text-body">{{ $post->body }}</p>
    <h6><strong>Status del post:</strong> {{ $post->info->post_status }}</h6>
    <h6><strong>Status dei commenti:</strong> {{ $post->info->comment_status }}</h6>
@endsection

@section('footer')

    <div class="mt-3">
        <h3>Commenti</h3>

        <ul class="comments mb-3">
            @foreach ($post->comments as $comment)
                <li class="comment py-2 px-2 mb-2">
                    <h5><strong>Utente:</strong> {{ $comment->person }}</h5>
                    <p>{{ $comment->text }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-danger text-uppercase my-2">torna agli articoli</a>
@endsection
