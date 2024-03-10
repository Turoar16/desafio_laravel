<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingreso;

class IngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generar 10 registros de ingresos aleatorios
        Ingreso::factory()->count(10)->create();
    }
}
