@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <h1 class="mb-5">{{ $post->title }}</h1>
            
                <p>By. <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name}}</a></p>
            
                {!! $post->body !!}
            
            <a href="/posts" class="d-block mt-3">Back to Post</a>
        </div>
    </div>
</div>
@endsection
