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

        $posts = Post::latest();
        
        if(request('search')){
            $posts->where('title', 'like', '%' .request('search'). '%')
            ->orWhere('body', 'like', '%' .request('search'). '%');
        }

        return view('posts', [
            "title" => "All Posts",
            'active' => 'posts',
            //active untuk semua halaman posts
            "posts" => $posts->get()
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
