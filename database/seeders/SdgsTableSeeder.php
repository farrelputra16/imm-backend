<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SdgsTableSeeder extends Seeder
{
    public function run()
    {
        $sdgs = [
            [
                'id' => 1,
                'name' => 'End poverty in all its forms everywhere',
                'order' => 1,
                'description' => null,
            ],
            [
                'id' => 2,
                'name' => 'End hunger, achieve food security and improved nutrition and promote sustainable agriculture',
                'order' => 2,
                'description' => null,
            ],
            [
                'id' => 3,
                'name' => 'Ensure healthy lives and promote well-being for all at all ages',
                'order' => 3,
                'description' => null,
            ],
            [
                'id' => 4,
                'name' => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all',
                'order' => 4,
                'description' => null,
            ],
            [
                'id' => 5,
                'name' => 'Achieve gender equality and empower all women and girls',
                'order' => 5,
                'description' => null,
            ],
            [
                'id' => 6,
                'name' => 'Ensure availability and sustainable management of water and sanitation for all',
                'order' => 6,
                'description' => null,
            ],
            [
                'id' => 7,
                'name' => 'Ensure access to affordable, reliable, sustainable and modern energy for all',
                'order' => 7,
                'description' => null,
            ],
            [
                'id' => 8,
                'name' => 'Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all',
                'order' => 8,
                'description' => null,
            ],
            [
                'id' => 9,
                'name' => 'Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation',
                'order' => 9,
                'description' => null,
            ],
            [
                'id' => 10,
                'name' => 'Reduce inequality within and among countries',
                'order' => 10,
                'description' => null,
            ],
            [
                'id' => 11,
                'name' => 'Make cities and human settlements inclusive, safe, resilient and sustainable',
                'order' => 11,
                'description' => null,
            ],
            [
                'id' => 12,
                'name' => 'Ensure sustainable consumption and production patterns',
                'order' => 12,
                'description' => null,
            ],
            [
                'id' => 13,
                'name' => 'Take urgent action to combat climate change and its impacts',
                'order' => 13,
                'description' => null,
            ],
            [
                'id' => 14,
                'name' => 'Conserve and sustainably use the oceans, seas and marine resources for sustainable development',
                'order' => 14,
                'description' => null,
            ],
            [
                'id' => 15,
                'name' => 'Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss',
                'order' => 15,
                'description' => null,
            ],
            [
                'id' => 16,
                'name' => 'Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels',
                'order' => 16,
                'description' => null,
            ],
            [
                'id' => 17,
                'name' => 'Strengthen the means of implementation and revitalize the Global Partnership for Sustainable Development',
                'order' => 17,
                'description' => null,
            ],
        ];

        DB::table('sdgs')->insert($sdgs);
    }
}
