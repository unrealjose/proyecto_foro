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
            'nombre'=>'Reglas Anuncios',
            'foro_id'=>1,
            'user_id'=>1
        ]);

        Tema::create([
            'nombre'=>'Reglas Informacion',
            'foro_id'=>2,
            'user_id'=>1
        ]);

        Tema::create([
            'nombre'=>'Reglas General',
            'foro_id'=>3,
            'user_id'=>1
        ]);

        Tema::create([
            'nombre'=>'Reglas Off-topic',
            'foro_id'=>4,
            'user_id'=>1
        ]);
    }
}
