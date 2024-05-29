<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\ActivityRegister;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityRegistersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            $activity = Activity::inRandomOrder()->first();
            ActivityRegister::create([
                "activity_id" => $activity->id,
                "user_id"     => $user->id
            ]);
        }
    }
}
