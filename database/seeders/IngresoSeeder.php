<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingreso;
use Carbon\Carbon;

class IngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear algunos registros de ingresos de ejemplo
        $ingresos = [
            [
                'usuario_id' => 1,
                'fecha' => Carbon::now()->subDays(7), // Ejemplo de fecha hace 7 días
                'concepto' => 'Pago de salario',
                'monto' => 1500.00,
            ],
            [
                'usuario_id' => 1,
                'fecha' => Carbon::now()->subDays(2), // Ejemplo de fecha hace 2 días
                'concepto' => 'Ingreso por ventas',
                'monto' => 1200.00,
            ],
            // Agrega más registros aquí según sea necesario
        ];

        // Insertar los registros en la base de datos
        foreach ($ingresos as $ingreso) {
            Ingreso::create($ingreso);
        }
    }
}
