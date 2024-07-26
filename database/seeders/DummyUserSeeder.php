<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Promise\Each;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create()->each(function ($user) {
            $user->roles()->attach(Role::all()->random());
        });
    }
}
