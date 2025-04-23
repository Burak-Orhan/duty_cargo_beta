<?php

namespace Database\Factories;

use App\Models\UserInformation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInformation>
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UserInformationFactory extends Factory
{
    protected $model = UserInformation::class;

    public function definition()
    {
        $cities = DB::table("cities")->pluck("name");

        return [
            'user_id' => User::factory(),
            'phone' => fake()->phoneNumber,
            'city' => $cities->random(),
            'state' => fake()->streetAddress,
            'zip_code' => fake()->postcode,
            'address' => fake()->address,
            "country" => fake()->country
        ];
    }
}
