<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contract_roles')->truncate();
        DB::table('contract_roles')->insert([
            ['id'         => 1,
             'name'       => 'Rol',
             'percentage' => 1
            ],
            [
                'id'         => 2,
                'name'       => 'Rol',
                'percentage' => 2
            ],
            [
                'id'         => 3,
                'name'       => 'Rol',
                'percentage' => 3
            ],
            [
                'id'         => 4,
                'name'       => 'Rol',
                'percentage' => 4
            ],
            [
                'id'         => 5,
                'name'       => 'Rol',
                'percentage' => 5
            ],
            [
                'id'         => 6,
                'name'       => 'Rol',
                'percentage' => 10
            ],
            [
                'id'         => 7,
                'name'       => 'Rol',
                'percentage' => 15
            ],
            [
                'id'         => 8,
                'name'       => 'Rol',
                'percentage' => 20
            ],
            [
                'id'         => 9,
                'name'       => 'Rol',
                'percentage' => 25
            ],
            [
                'id'         => 10,
                'name'       => 'Rol',
                'percentage' => 30
            ],
            [
                'id'         => 11,
                'name'       => 'Rol',
                'percentage' => 35
            ],
            [
                'id'         => 12,
                'name'       => 'Rol',
                'percentage' => 40
            ],
            [
                'id'         => 13,
                'name'       => 'Rol',
                'percentage' => 45
            ],
            [
                'id'         => 14,
                'name'       => 'Rol',
                'percentage' => 50
            ],
            [
                'id'         => 15,
                'name'       => 'Rol',
                'percentage' => 55
            ],
            [
                'id'         => 16,
                'name'       => 'Rol',
                'percentage' => 60
            ],
            [
                'id'         => 17,
                'name'       => 'Rol',
                'percentage' => 65
            ],
            [
                'id'         => 18,
                'name'       => 'Rol',
                'percentage' => 70
            ],
            [
                'id'         => 19,
                'name'       => 'Rol',
                'percentage' => 75
            ],
            [
                'id'         => 20,
                'name'       => 'Rol',
                'percentage' => 80
            ],
            [
                'id'         => 21,
                'name'       => 'Rol',
                'percentage' => 85
            ],
            [
                'id'         => 22,
                'name'       => 'Rol',
                'percentage' => 90
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
