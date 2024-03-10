<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingreso;

class IngresoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingreso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => 1, // ID del usuario al que se asignará el ingreso
            'fecha' => $this->faker->date(), // Fecha aleatoria
            'concepto' => $this->faker->sentence(), // Descripción aleatoria del ingreso
            'monto' => $this->faker->randomFloat(2, 10, 1000), // Monto aleatorio entre 10 y 1000
            // Agregar más campos y datos aquí si es necesario
        ];
    }
}
