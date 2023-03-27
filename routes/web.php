<?php

use App\Http\Controllers\PostController;
use App\Models\category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "milymax",
        "email" => "hellomily@gmail.com",
        "image" => "cat.jpeg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);


// halaman single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);




Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts' , [
        'title' => "Post by Category : $category->name",
        'posts' => $category->posts->load('category', 'author'),
        //agar tidak melakukan query berulang-ulang atau masalah n+1 maka digunakan load
        //tidak bisa langsung menggunakan with() karena ini adalah routesmodelbinding
        //jadi yang sebelumnya melakukan query berulang - ulang bisa diringkas menjadi 4 saja 
        //bisa di tes menggunakan clockwork
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('posts', [
        'title' => "Post by Author : $author->name",
        'posts' => $author->posts->load('category', 'author'),
        //fitur contoh eager loading bisa dilihat di /PostController.php
    ]);
});