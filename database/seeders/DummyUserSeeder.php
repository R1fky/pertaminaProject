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
        $userData = [
            [
                $role = Role::where('role_id', 1)->first(), // Ambil role dengan id = 
                $user = new User(),
                $user->name = 'Golwiner',
                $user->email = 'golwiner@gmail.com',
                $user->nip = 2345432,
                $user->bagian = 'HSSE',
                $user->password = bcrypt('password'),
                $user->role_id = $role->role_id, // Set role_id dengan role_id dari role yang telah didapat
                $user->save()
            ],
            [
                $role = Role::where('role_id',2)->first(), // Ambil role dengan id = 1
                $user = new User(),
                $user->name = 'Tada',
                $user->email = 'tada@gmail.com',
                $user->nip = 2345432,
                $user->bagian = 'RSD',
                $user->password = bcrypt('password'),
                $user->role_id = $role->role_id, // Set role_id dengan role_id dari role yang telah didapat
                $user->save()
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create();
        }
    }
}
