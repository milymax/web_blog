<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index() 
    {
        // dd(request('search')); melakukan tes apakah request dari name='search' kita diterima atau tidak
                

        return view('posts', [
            "title" => "All Posts",
            'active' => 'posts',
            //active untuk semua halaman posts
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->get()
            // "posts" => Post::with('author','category')->latest()->get()
            //dengan with() memeungkinkan untuk memanggil query Post sekaligus author dan category
            //sehingga bisa mempersingkat proses yang dinamakan eagle Loading
            //contoh LazyEagerLoading bisa dilihat di /web.php
        ]);
    }
    
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            'active' => 'posts',
            "post" => $post
        ]);
    }
    
}
