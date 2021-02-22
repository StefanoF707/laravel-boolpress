@extends('layouts.main')

@section('header')
    <h1>pagina articolo: {{ $post->id }}</h1>
@endsection

@section('content')
    <h2>{{ $post->title }}</h2>
    <h4 class="text-muted">{{ $post->author }}</h4>
    <p>{{ $post->body }}</p>
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

        <div class="form-comments my-2 text-capitalize">
            <form action="{{ route('add-comment', $post->id) }}" method="post">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="person">autore</label>
                    <input type="text" class="form-control @error('person') is-invalid @enderror" name="person" id="person" placeholder="Inserisci il nome dell'autore">
                </div>

                <div class="form-group">
                    <label for="text">commento</label>
                    <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" rows="5" placeholder="Inserisci qui il tuo commento"></textarea>
                </div>

                <button type="submit" name="button" class="btn btn-success text-uppercase">invia</button>
            </form>
        </div>
    </div>

    <a href="{{ route('blog') }}" class="btn btn-danger text-uppercase my-2">torna al blog</a>
@endsection
