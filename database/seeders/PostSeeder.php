<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'mensaje'=>'prueba',
            'foro_id'=>1,
            'user_id'=>1,
            'tema_id'=>1
        ]);

        Post::create([
            'mensaje'=>'prueba2',
            'foro_id'=>1,
            'user_id'=>1,
            'tema_id'=>2
        ]);

        Post::create([
            'mensaje'=>'prueba3',
            'foro_id'=>1,
            'user_id'=>1,
            'tema_id'=>2
        ]);

        Post::create([
            'mensaje'=>'prueba4',
            'foro_id'=>2,
            'user_id'=>1,
            'tema_id'=>3
        ]);
    }
}
