@extends('layouts.main')

@section('header')
    <h1>Tutti i post</h1>
@endsection

@section('content')

    @if (session('created'))
        <div class="alert alert-success">
            {{ session('created') }}
        </div>
    @elseif (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }}
        </div>
    @elseif (session('edited'))
        <div class="alert alert-warning">
            {{ session('edited') }}
        </div>
    @endif
    
    <table class="table table-dark table-striped table-bordered">
        <thead>
            <tr>
                <th>titolo</th>
                <th>preview</th>
                <th>autore</th>
                <th>commenti</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr($post->body, 0, 60) . '...' }}</td>
                    <td>{{ $post->author }}</td>
                    <td>commenti: {{ count($post->comments) }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">INFO</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    <a href="{{ route('posts.create') }}" class="btn btn-success text-uppercase mb-3">crea nuovo prodotto</a>
@endsection
