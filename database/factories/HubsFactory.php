<?php

namespace Database\Factories;

use App\Models\Hubs;
use Illuminate\Database\Eloquent\Factories\Factory;

class HubsFactory extends Factory
{
    protected $model = Hubs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->city,
            'number_of_organizations' => $this->faker->numberBetween(1, 100),
            'number_of_people' => $this->faker->numberBetween(10, 500),
            'number_of_events' => $this->faker->numberBetween(1, 50),
            'rank' => $this->faker->numberBetween(1, 10),
            'top_investor_types' => $this->faker->word,
            'top_funding_types' => $this->faker->word,
            'description' => $this->faker->paragraph,
        ];
    }
}
