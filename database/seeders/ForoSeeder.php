<?php

namespace Database\Seeders;

use App\Models\foro;
use Illuminate\Database\Seeder;

class ForoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Foro::create([
            'nombre'=>'Anuncios',
            'descripcion'=>'Anuncios de algo'
        ]);

        Foro::create([
            'nombre'=>'Informacion',
            'descripcion'=>'Informacion de algo'
        ]);

        Foro::create([
            'nombre'=>'General',
            'descripcion'=>'General de algo'
        ]);

        Foro::create([
            'nombre'=>'Off-topic',
            'descripcion'=>'Off-topic de lo que sea'
        ]);
    }
}
