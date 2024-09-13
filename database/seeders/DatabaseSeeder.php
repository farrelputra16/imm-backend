<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TagsTableSeeder::class);
        $this->call(MetricsTableSeeder::class);
        $this->call(SdgsTableSeeder::class);
        $this->call(IndicatorsTableSeeder::class);
        $this->call(MetricTagTableSeeder::class);
        $this->call(MetricIndicatorTableSeeder::class);
    }
}
