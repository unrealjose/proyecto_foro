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

        /*
            Anuncios
            Noticias y actualidad
            General

            Europa
            Africa
            Asia
            America
            Oceania

            Off-Topic
        */

        Foro::create([
            'nombre'=>'Anuncios',
            'descripcion'=>'Anuncios relacionados con este foro'
        ]);

        Foro::create([
            'nombre'=>'Noticias y actualidad',
            'descripcion'=>'Noticias sobre el mundo'
        ]);

        Foro::create([
            'nombre'=>'General',
            'descripcion'=>'Temas Generaless'
        ]);

        Foro::create([
            'nombre'=>'Europa',
            'descripcion'=>'Sobre Europa'
        ]);

        Foro::create([
            'nombre'=>'Africa',
            'descripcion'=>'Sobre Africa'
        ]);

        Foro::create([
            'nombre'=>'Asia',
            'descripcion'=>'Sobre Asia'
        ]);

        Foro::create([
            'nombre'=>'America',
            'descripcion'=>'Sobre America'
        ]);

        Foro::create([
            'nombre'=>'Oceania',
            'descripcion'=>'Sobre Oceania'
        ]);

        Foro::create([
            'nombre'=>'Off-Topic',
            'descripcion'=>''
        ]);

    }
}
