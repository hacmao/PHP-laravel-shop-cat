<?php

namespace Database\Factories;

use App\Models\CatType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CatType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'img' => 'https://cdn.chotot.com/1DIewdEQm1r-j8IpMQXUnTcCVXP_KcMiYylIZMbkSY0/preset:listing/plain/e30b1f210d44deeca4dd23ab892ae944-2740420474764745734.jpg'
        ];
    }
}
