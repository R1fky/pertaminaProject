<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleData = [
            [
                'role_id' => 1,
                'role_name' => 'organik'
            ],
            [
                'role_id' => 2,
                'role_name' => 'tkjp'
            ],
        ];

        foreach ($roleData as $key => $value) {
            Role::create($value);
        }
    }
}
