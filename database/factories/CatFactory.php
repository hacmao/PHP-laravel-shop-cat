<?php

namespace Database\Factories;

use App\Models\Cat;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'meo '.$this->faker->numberBetween(1000000, 2000000),
            'img' => 'https://cdn.chotot.com/1DIewdEQm1r-j8IpMQXUnTcCVXP_KcMiYylIZMbkSY0/preset:listing/plain/e30b1f210d44deeca4dd23ab892ae944-2740420474764745734.jpg',
            'type' => $this->faker->randomElement(['meo mun', 'meo ba tu']),
            'location' => $this->faker->randomElement(['HN', 'HCM', 'DN']),
            'age' => $this->faker->randomFloat(1,0.1, 10),
            'price' => $this->faker->numberBetween(1000000, 10000000),
            'state' => $this->faker->randomElement([1,2,3])
        ];
    }
}
