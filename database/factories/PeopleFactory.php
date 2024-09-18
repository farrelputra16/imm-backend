<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'role' => $this->faker->randomElement(['mentor', 'pekerja', 'konsultan']),
            'primary_job_title' => $this->faker->jobTitle,
            'primary_organization' => $this->faker->company,
            'location' => $this->faker->city,
            'regions' => $this->faker->state,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'linkedin_link' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'phone_number' => $this->faker->phoneNumber,
            'gmail' => $this->faker->safeEmail,
        ];
    }
}
