<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index() 
    {
        return view('posts', [
            "title" => "All Posts",
            "posts" => Post::latest()->get()
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
            "post" => $post
        ]);
    }
    
}
