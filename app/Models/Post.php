<?php

namespace App\Models;

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

    //menghubungkan tabel : mengembalikan nilai, 1 Post hanya Memiliki 1 Category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
