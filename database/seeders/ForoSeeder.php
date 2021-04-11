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
        foro::created([
            'nombre'=>'Anuncios'
        ]);

        foro::created([
            'nombre'=>'Informacion'
        ]);

        foro::created([
            'nombre'=>'General'
        ]);

        foro::created([
            'nombre'=>'Off-topic'
        ]);
    }
}
