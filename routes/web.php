<?php

use App\Http\Controllers\PostController;
use App\Models\category;
use App\Models\Post;
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


Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('category' , [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});