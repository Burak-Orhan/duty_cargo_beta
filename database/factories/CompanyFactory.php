<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */

class CompanyFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => fake()->company(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'post_date' => now()->toDateString(),
            "country" => fake()->country(),
        ];
    }
}
