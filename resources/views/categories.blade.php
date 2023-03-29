
@extends('layouts.main')



@section('container')
    <h1 class="mb-5">Post Categories</h1>
    
    <div class="container">
        <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm-4">
        <a href="/categories/{{ $category->slug }}">
        <div class="card text-bg-dark">
        <img src="https://source.unsplash.com/500x500/?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
            <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
                {{-- code diaatas untuk membuat tulisan mengarah ke tengah --}}
            <h5 class="card-title flex-fill text-center p-4" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
            </div>
        </div>
        </a>
        </div>
        @endforeach
        </div>
    </div>
@endsection
