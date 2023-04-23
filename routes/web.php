<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Models\category;
use GuzzleHttp\Middleware;
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
        "title" => "Home",
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "milymax",
        "email" => "hellomily@gmail.com",
        "image" => "cat.jpeg",
        'active' => 'about'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);


// halaman single post
// route model binding = post:slug -> untuk mengubah pencarian dari default id menjadi slug
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


//dibawah ini tidak terpakai karena sudah digantikan di PostController

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author'),
//         //agar tidak melakukan query berulang-ulang atau masalah n+1 maka digunakan load
//         //tidak bisa langsung menggunakan with() karena ini adalah routesmodelbinding
//         //jadi yang sebelumnya melakukan query berulang - ulang bisa diringkas menjadi 4 saja 
//         //bisa di tes menggunakan clockwork
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post by Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author'),
//         //fitur contoh eager loading bisa dilihat di /PostController.php
//     ]);
// });


// Router untuk login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');//hanya penamaan dimana route login itu
//kenapa ada route dengan nama login ? coba cek di authenticate.php di App\Http\Middleware\Authenticate.php 
//pemberian name digunakan untuk menamai route dengan link apapun itu 
//middleware('guest') : hanya bisa diakses oleh user yang belum login/ter-authentikasi
Route::post('/login', [LoginController::class, 'authenticate']);
//logout
Route::post('/logout', [LoginController::class, 'logout']);

// Router untuk register
Route::get('/register', [RegisterController::class, 'index']);
// Router untuk register
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
//middleware('auth') : hanya bisa diakses oleh user yang sudah login/ter-authentikasi

//route resource DashboardPostController : tidak perlu membuat 1 1 jika memakai resource
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');