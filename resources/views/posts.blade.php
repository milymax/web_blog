
@extends('layouts.main')



@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @if ($posts->count())
    <div class="card mb-3">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body text-center">
        <h5 class="card-title">{{ $posts[0]->title }}</h5>

        <p><small class="text-body-secondary">By. <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name}}</a> in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }} 
            {{-- diffForHumans adalah library carbon punya Laravel --}}
        </small></p>

        <p class="card-text">{{ $posts[0]->excerpt }}</p>

        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

        </div>
        
    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif

    
    @foreach ($posts as $post)
    <article class="mb-5 border-bottom pb-4">
        {{-- Judul --}}
        <h2>
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
        </h2> 
        {{-- Category --}}
        <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name}}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>


        {{-- <p>By. Artomily in <a href="/categories/{{ $post->categories->slug }}" class="text-decoration-none" --}}
            {{-- >{{ $post->category->name }}</a></p>  --}}
            
        <p>{{ $post->excerpt }}</p>

        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more..</a>
        
    </article>
    @endforeach

@endsection
