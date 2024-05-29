<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
          'name'=>'Salud'
        ]);

        Category::create([
            'name'=>'Coaching'
        ]);

        Category::create([
            'name'=>'Trading'
        ]);

        Category::create([
            'name'=>'Criptomonedas'
        ]);

        Category::create([
            'name'=>'Finanzas'
        ]);

        Category::create([
            'name'=>'Marketing'
        ]);
    }
}
