<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // User::create([
        //     'name' => 'artomily',
        //     'email' => 'mily@gmail.com',
        //     'password' => bcrypt('1234')
        // ]);
        
        // User::create([
            //     'name' => 'mily',
            //     'email' => 'arto@gmail.com',
            //     'password' => bcrypt('1234')
            // ]);
            
            
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'Judul ke Tiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid excepturi laboriosam, corrupti tempore vero aliquam facilis incidunt provident eos aut doloribus exercitationem nam tempora cum, ratione eveniet, expedita quibusdam harum?',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
    }
}
