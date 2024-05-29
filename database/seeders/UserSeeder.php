<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            "name" => 'Admin',
            "email" => "admin@local.com",
            "password" => bcrypt(123456),
            "roles_id" => 1
        ]);

        User::factory()->count(150)->create();
    }
}
