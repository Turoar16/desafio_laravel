<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create(); // Esto creará un usuario utilizando el factory
        $this->call(GastoSeeder::class);
        $this->call(IngresoSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleHasPermissionSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
