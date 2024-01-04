@extends('layout')
<h1>Nouvel article</h1>

<form method="POST" action="{{route('articles.store')}}">
    @csrf
    @include('articles.fields')
    @include('tags.list')
    @include('tags.create')
<input type="submit">
</form>
