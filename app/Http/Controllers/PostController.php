<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\category;
use App\Models\User;


class PostController extends Controller
{
    public function index() 
    {
        // dd(request('search')); melakukan tes apakah request dari name='search' kita diterima atau tidak
                

        $title = '';
        if(request('category')){
            //cari category yang slugnya sama dengan request('category') jika ada maka rubah titlenya
           $category = Category::firstWhere('slug', request('category'));
           $title = ' in ' . $category->name;
        }
        if(request('author')){
            //cari author yang usernamenya sama dengan request('author') jika ada maka rubah titlenya
           $author = User::firstWhere('username', request('author'));
           $title = ' by ' . $author->name;
        }
        
        return view('posts', [
            "title" => "All Posts" . $title,
            'active' => 'posts',
            //active untuk semua halaman posts
            "posts" => Post::latest()->filter(request(['search', 'category','author']))->paginate(7)->withQueryString()

            //method get() diganti paginate untuk menambahkan fitur pagination
            //Apapun yang ada diQueryString sebelumnya bawa contohnya kita sedang memfilter berdasarkan category
            //maka link untuk pagination tersebut tidak akan mereset ke All Post lagi  

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
