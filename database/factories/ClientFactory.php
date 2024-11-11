<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        $firstContactDate = $this->faker->dateTimeBetween('-2 years', '-1 month');
        $lastContactDate = $this->faker->dateTimeBetween($firstContactDate, 'now');

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'age_range' => $this->faker->randomElement(['18-24', '25-30', '31-39', '40-50', '50+']),
            'description' => $this->faker->sentence,
            'special_notes' => $this->faker->paragraph,
            'first_contact_date' => $firstContactDate->format('Y-m-d'),
            'last_contact_date' => $lastContactDate->format('Y-m-d'),
        ];
    }
}
