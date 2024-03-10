<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gasto;

class GastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generar 10 registros de gastos aleatorios
        Gasto::factory()->count(10)->create();
    }
}
