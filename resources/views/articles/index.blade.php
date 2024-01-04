@extends('with_nav')

@section('content')
    <h1>coucou</h1>
    <a href="{{ route('articles.create') }}">Créer un article</a>

    @foreach ($articles as $article)
    <li>
        <a href="{{ route('articles.show', $article)}}">{{ $article->title }}</a>
    </li>
    @endforeach

@endsection
