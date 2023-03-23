@extends('layouts.main')

@section('container')

        <h2 class="mb-5">{{ $post->title }}</h2>

        <p>By. Artomily <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name}}</a></p>

        {!! $post->body !!}

    <a href="/posts">Back to Post</a>
@endsection