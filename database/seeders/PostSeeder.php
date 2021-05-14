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
            'mensaje'=>'Reglas anuncios....',
            'foro_id'=>1,
            'user_id'=>1,
            'tema_id'=>1
        ]);

        Post::create([
            'mensaje'=>'Reglas informacion....',
            'foro_id'=>2,
            'user_id'=>1,
            'tema_id'=>2
        ]);

        Post::create([
            'mensaje'=>'Reglas general....',
            'foro_id'=>3,
            'user_id'=>1,
            'tema_id'=>3
        ]);

        Post::create([
            'mensaje'=>'Reglas off-topic....',
            'foro_id'=>4,
            'user_id'=>1,
            'tema_id'=>4
        ]);
    }
}
