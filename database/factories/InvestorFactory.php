<?php

namespace Database\Factories;

use App\Models\Investor;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'org_name' => $this->faker->company, // Nama perusahaan
            'number_of_contacts' => $this->faker->numberBetween(1, 100), // Kontak acak antara 1 - 100
            'number_of_investments' => $this->faker->numberBetween(1, 50), // Jumlah investasi acak antara 1 - 50
            'location' => $this->faker->city, // Kota acak
            'description' => $this->faker->paragraph, // Deskripsi acak
            'departments' => $this->faker->word, // Departemen acak
        ];
    }
}
