@extends('with_nav')
@section('content')


<h1>{{ $article->title }}</h1>

@foreach ($article->tags as $tag)
    <span class="badge rounded-pill bg-secondary">{{ $tag->name }}</span>
@endforeach


<p>{{ $article->body }}</p>

<form method="POST" action="{{route('articles.comments.store', $article)}}">
    @csrf
    <textarea name="body" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Comment article">
</form>

<form method="POST" action="{{ Route('articles.destroy', $article) }}">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete article">
</form>
<a href="{{ route('articles.edit', $article)}}">edit acticle</a>

<h2>Comments</h2>

@foreach ($article->comments as $comment)
    <div class="card">
        <div class="card-body">
            {{ $comment->body }}
        </div>
    </div>
@endforeach

@endsection
