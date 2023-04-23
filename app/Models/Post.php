<?php

namespace App\Models;

use Clockwork\Storage\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //mengisi value yang ada di dalam array dibawah
    // protected $fillable = ['title','excerpt','body'];
    
    //tidak dapat mengisi value id tetapi yang lain boleh
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];
    // "posts" => Post::with('author','category')->latest()->get()
        //dengan with() memeungkinkan untuk memanggil query Post sekaligus author dan category
        //sehingga bisa mempersingkat proses yang dinamakan eagle Loading
        //contoh LazyEagerLoading bisa dilihat di /web.php


    public function scopeFilter($query, array $filters)
    {
        // '?' kalau ada maka ambil apapun yang ada di searchnya ':' kalau tidak ada maka tampilkan false atau wherenya tidak dijalankan
        // if (isset ($filters['search']) ? $filters('search') : false) {
        //     $query->where('title', 'like', '%' . $filters('search') . '%')
        //     ->orWhere('body', 'like', '%' . $filters('search') . '%');
        // }

        //mencari berdasarkan search di all post
        //'??' jika ada jalankan jika tidak ada false atau tidak dijalankan

        //menggunakan funtion agar pencariannya berdasarkan categorynya masuk ke grup query 
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        //mencari berdasarkan search di dalam post yang sudah ada cateogorynya 
        //versi callback
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        //sama seperti category hanya saja ini filter author
        //'fn' adalah arrow function
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) => /*use ($author) jika menggunakan arrow function maka tidak perlu menggunakan ini karena query scopenya sudah mencari diatasnya*/
                $query->where('username', $author)
            )
        );

    }

        
    //menghubungkan tabel : mengembalikan nilai, 1 Post hanya Memiliki 1 Category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
 * Get the route key for the model.
 */
    //membuat setiap route mencari slug bukan id
    //membuat slug itu menjadi nilai default untuk pencarian
    //jadi meskipun tidak memakai route model binding yang dicari itu otomatis slug karena diubah menggunakan fungsi dibawah 
    public function getRouteKeyName(): string
    {
    return 'slug';
    }
}
