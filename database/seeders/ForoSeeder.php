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
        foro::create([
            'nombre'=>'Anuncios',
            'descripcion'=>'Anuncios de algo'
        ]);

        foro::create([
            'nombre'=>'Informacion',
            'descripcion'=>'Informacion de algo'
        ]);

        foro::create([
            'nombre'=>'General',
            'descripcion'=>'General de algo'
        ]);

        foro::create([
            'nombre'=>'Off-topic',
            'descripcion'=>'Off-topic de lo que sea'
        ]);
    }
}
