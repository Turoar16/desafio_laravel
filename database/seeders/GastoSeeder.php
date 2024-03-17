<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gasto;
use Carbon\Carbon;

class GastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gastos = [
            [
                'usuario_id' => 1,
                'fecha' => Carbon::now()->subDays(5), // Ejemplo de fecha hace 5 días
                'concepto' => 'Compra de alimentos',
                'monto' => 50.00,
            ],
            [
                'usuario_id' => 1,
                'fecha' => Carbon::now()->subDays(3), // Ejemplo de fecha hace 3 días
                'concepto' => 'Pago de servicios',
                'monto' => 80.00,
            ],
            // Agrega más registros aquí según sea necesario
        ];

        // Insertar los registros en la base de datos
        foreach ($gastos as $gasto) {
            Gasto::create($gasto);
        }
    }
}
