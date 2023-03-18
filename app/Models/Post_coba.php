<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

//post_ untuk belajar;

class Post_coba 
{
    private static $blog_posts =
    [
        [
            "title" => "Post Judul Pertama",
            "slug" => "post-judul-pertama",
            "author" => "Milymax",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos veritatis non deleniti nobis illum dolorum necessitatibus, incidunt libero, ipsa modi quis enim dolore praesentium molestias saepe voluptatibus numquam similique provident! Sed corrupti, voluptates, cupiditate voluptatibus esse atque rem officia delectus magni reprehenderit, odio quae. Esse quo quas id aliquam! Laboriosam modi accusamus commodi tempore pariatur voluptas minima magni maxime asperiores officia quaerat, voluptatum quibusdam ullam voluptatem eum repellendus non dignissimos rerum obcaecati mollitia laudantium dolorem? Aperiam vel sint nulla provident!"
        ],
        [
            "title" => "Post Judul Kedua",
            "slug" => "post-judul-kedua",
            "author" => "artomily",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus tempora sequi magnam ipsa tempore omnis porro cupiditate, facere iusto id cumque eos provident reiciendis sunt quibusdam autem, sed consectetur nesciunt officiis commodi deleniti? Ipsam, adipisci quaerat! Iusto blanditiis numquam aliquam vel explicabo dolor molestias qui cumque libero. Optio dicta similique ea fuga debitis quam neque consequatur dolorum consequuntur minima. Obcaecati asperiores assumenda amet at in porro dolores delectus aliquam voluptas corrupti. Exercitationem quia commodi autem cumque itaque dolores placeat pariatur ducimus, ipsam aspernatur, minus, vel nam magnam dignissimos nihil ipsa hic qui! Velit porro laboriosam veniam totam culpa expedita quia!"
        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }   

    public static function find($slug)
    {
        $posts = static::all();
        
        return $posts -> firstWhere('slug', $slug);
    }
    
}