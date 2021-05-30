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
            'mensaje'=>'Reglas de Noticias y actualidad .....',
            'foro_id'=>2,
            'user_id'=>1,
            'tema_id'=>2
        ]);

        Post::create([
            'mensaje'=>'Reglas del tema General .....',
            'foro_id'=>3,
            'user_id'=>1,
            'tema_id'=>3
        ]);

        Post::create([
            'mensaje'=>'Reglas del tema Europa .....',
            'foro_id'=>4,
            'user_id'=>1,
            'tema_id'=>4
        ]);

        Post::create([
            'mensaje'=>'Reglas del tema Africa .....',
            'foro_id'=>5,
            'user_id'=>1,
            'tema_id'=>5
        ]);

        Post::create([
            'mensaje'=>'Reglas del tema Asia .....',
            'foro_id'=>6,
            'user_id'=>1,
            'tema_id'=>6
        ]);

        Post::create([
            'mensaje'=>'Reglas del tema America .....',
            'foro_id'=>7,
            'user_id'=>1,
            'tema_id'=>7
        ]);

        Post::create([
            'mensaje'=>'Reglas del tema Oceania .....',
            'foro_id'=>8,
            'user_id'=>1,
            'tema_id'=>8
        ]);

        Post::create([
            'mensaje'=>'Reglas del Off-Topic .....',
            'foro_id'=>9,
            'user_id'=>1,
            'tema_id'=>9
        ]);

    }
}
