@extends('layouts.main')

@section('header')
    <h1>crea nuovo elemento</h1>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="Inserisci il titolo">
        </div>

        <div class="form-group">
            <label for="author">autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author" value="{{ old('author') }}" placeholder="Inserisci il nome dell'autore">
        </div>

        <div class="form-group">
            <label for="img_path">immagine</label>
            <input type="text" class="form-control @error('img_path') is-invalid @enderror" name="img_path" id="img_path" value="{{ old('img_path') }}" placeholder="Inserisci il percorso dell'immagine">
        </div>

        <div class="form-group">
            <label for="post_status">stato del post</label>
            <select class="form-control text-capitalize" id="post_status" name="post_status">
                <option @if( old('post_status') == 'draft') selected  @endif value="draft">draft</option>
                <option @if( old('post_status') == 'public') selected @endif value="public">public</option>
                <option @if( old('post_status')  == 'private')  selected @endif value="private">private</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comment_status">stato del commento</label>
            <select class="form-control text-capitalize" id="comment_status" name="comment_status">
                <option @if( old('comment_status')  == 'open') selected  @endif value="open">open</option>
                <option @if( old('comment_status') == 'closed') selected  @endif value="closed">closed</option>
                <option @if( old('comment_status') == 'private') selected  @endif value="private">private</option>
            </select>
        </div>

        <div class="form-group">
            <label for="body">testo</label>
            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="5" placeholder="Inserisci il testo">{{ old('body') }}</textarea>
        </div>

        <div class="form-group">
            <h2>Tags</h2>
            @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" name="button" class="btn btn-success text-uppercase">salva</button>
        <a href="{{ route('posts.index') }}" class="btn btn-danger text-uppercase">torna indietro</a>
    </form>
@endsection
