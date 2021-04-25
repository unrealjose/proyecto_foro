<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tema;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tema::create([
            'nombre'=>'Nuevos cambios',
            'foro_id'=>1,
            'user_id'=>1
        ]);

        Tema::create([
            'nombre'=>'Nuevos cambios 2',
            'foro_id'=>1,
            'user_id'=>1
        ]);

        Tema::create([
            'nombre'=>'AAA',
            'foro_id'=>2,
            'user_id'=>1
        ]);
    }
}
