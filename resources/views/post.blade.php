@extends('layouts.main')

@section('container')

        <h2 class="mb-5">{{ $post->title }}</h2>

        <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name}}</a></p>

        {!! $post->body !!}

    <a href="/posts" class="d-block mt-3">Back to Post</a>
@endsection