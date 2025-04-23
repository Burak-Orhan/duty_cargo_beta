<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CargosFactory extends Factory
{
    public function definition(): array
    {
        static $i = 1;
        return [
            'company_id' => Company::factory(),
            'customer_id' => Customer::factory(),
            "user_id" => User::factory(),
            "tracking_code" => "KRG0000" . $i++,
        ];

    }
}
