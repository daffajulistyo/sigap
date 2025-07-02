<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'PASAMANKAB',
            'email' => 'pasaman@gmail.com',
            'password' => bcrypt('#pasaman!'),
            'username' => 'admin',
        ]);


        // Create the third user
        User::factory()->create([
            'name' => 'DAFFA JULISTIO',
            'email' => 'daffa@diskominfo.com',
            'password' => bcrypt('helpdesk'),
            'username' => 'daffa',
            'role' => 'superadmin',
        ]);


    }
}
