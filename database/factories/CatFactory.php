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
            'img' => 'http://bannenbiet.com/wp-content/uploads/2020/07/ngon-ngu-meo.jpg',
            'type' => $this->faker->randomElement(['meo mun', 'meo ba tu']),
            'location' => $this->faker->randomElement(['HN', 'HCM', 'DN']),
            'age' => $this->faker->randomFloat(1,0.1, 10),
            'price' => $this->faker->numberBetween(1000000, 10000000),
            'state' => $this->faker->randomElement([1,2,3])
        ];
    }
}
