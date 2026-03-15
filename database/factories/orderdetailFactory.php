<?php

namespace Database\Factories;

use App\Models\orderdetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class orderdetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = orderdetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'productid' => $this->faker->randomDigitNotNull,
        'orderid' => $this->faker->randomDigitNotNull,
        'quantity' => $this->faker->randomDigitNotNull,
        'subtotal' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
