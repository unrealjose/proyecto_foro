<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Administrador',
            'email'=>'admin@foro.es',
            'password'=>Hash::make('admin'),
            'rango'=>2,
            'email_verified_at'=>now()
        ]);

        User::create([
            'name'=>'UserNormal',
            'email'=>'userNormal@foro.es',
            'password'=>Hash::make('user'),
            'rango'=>1,
            'email_verified_at'=>now()
        ]);
    }
}
