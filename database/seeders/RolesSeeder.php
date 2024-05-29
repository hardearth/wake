<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create([
            "id" => 1,
            "name" => 'Super Administrador',
            "slug" => 'superadmin',
        ]);
        Role::create([
            "id" => 2,
            "name" => 'Administrador',
            "slug" => 'admin',
        ]);
        Role::create([
            "id" => 3,
            "name" => 'Usuario',
            "slug" => 'user',
        ]);
        Role::create([
            "id" => 4,
            "name" => 'Profesor',
            "slug" => 'teacher',
        ]);
    }
}
