<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Gasto;

class GastoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gasto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => 1,
            'fecha' => $this->faker->date,
            'concepto' => $this->faker->sentence,
            'monto' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
