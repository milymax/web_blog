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
}
