<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\MetricsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(MetricsTableSeeder::class);
        $this->call(SdgsTableSeeder::class);
        $this->call(IndicatorsTableSeeder::class);
        $this->call(MetricTagTableSeeder::class);
        $this->call(MetricIndicatorTableSeeder::class);
        $this->call(InvestorSeeder::class);
        $this->call([DepartmentsTableSeeder::class]);
        $this->call(CompanySeeder::class);
    }
}
