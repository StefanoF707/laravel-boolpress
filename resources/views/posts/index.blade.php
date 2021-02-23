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
                <th>stato post</th>
                <th>commenti</th>
                <th>stato commenti</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="table-title">{{ $post->title }}</td>
                    <td class="table-prev">{{ substr($post->body, 0, 60) . '...' }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->info->post_status }}</td>
                    <td>commenti: {{ count($post->comments) }}</td>
                    <td>{{ $post->info->comment_status }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success"><i class="fas fa-search"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    <a href="{{ route('posts.create') }}" class="btn btn-success text-uppercase mb-3">crea nuovo prodotto</a>
@endsection
