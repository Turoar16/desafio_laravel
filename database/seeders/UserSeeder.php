<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'nombre' => 'Pedro Perez',
            'telefono' => '0982123123',
            'direccion' => 'Ciudad del Este',
        ]);

        $user->assignRole('Admin');
    }
}
