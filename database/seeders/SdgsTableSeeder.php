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
                'img' => "E-WEB-Goal-1.png",
                'name' => 'End poverty in all its forms everywhere',
                'short_name' => 'No Poverty',
                'order' => 1,
                'description' => null,
            ],
            [
                'id' => 2,
                'img' => "E-WEB-Goal-2.png",
                'name' => 'End hunger, achieve food security and improved nutrition and promote sustainable agriculture',
                'short_name' => 'Zero Hunger',
                'order' => 2,
                'description' => null,
            ],
            [
                'id' => 3,
                'img' => "E-WEB-Goal-3.png",
                'name' => 'Ensure healthy lives and promote well-being for all at all ages',
                'short_name' => 'Good Health and Well-being',
                'order' => 3,
                'description' => null,
            ],
            [
                'id' => 4,
                'img' => "E-WEB-Goal-4.png",
                'name' => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all',
                'short_name' => 'Quality Education',
                'order' => 4,
                'description' => null,
            ],
            [
                'id' => 5,
                'img' => "E-WEB-Goal-5.png",
                'name' => 'Achieve gender equality and empower all women and girls',
                'short_name' => 'Gender Equality',
                'order' => 5,
                'description' => null,
            ],
            [
                'id' => 6,
                'img' => "E-WEB-Goal-6.png",
                'name' => 'Ensure availability and sustainable management of water and sanitation for all',
                'short_name' => 'Clean Water and Sanitation',
                'order' => 6,
                'description' => null,
            ],
            [
                'id' => 7,
                'img' => "E-WEB-Goal-7.png",
                'name' => 'Ensure access to affordable, reliable, sustainable and modern energy for all',
                'short_name' => 'Affordable and Clean Energy',
                'order' => 7,
                'description' => null,
            ],
            [
                'id' => 8,
                'img' => "E-WEB-Goal-8.png",
                'name' => 'Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all',
                'short_name' => 'Decent Work and Economic Growth',
                'order' => 8,
                'description' => null,
            ],
            [
                'id' => 9,
                'img' => "E-WEB-Goal-9.png",
                'name' => 'Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation',
                'short_name' => 'Industry, Innovation and Infrastructure',
                'order' => 9,
                'description' => null,
            ],
            [
                'id' => 10,
                'img' => "E-WEB-Goal-10.png",
                'name' => 'Reduce inequality within and among countries',
                'short_name' => 'Reduced Inequality',
                'order' => 10,
                'description' => null,
            ],
            [
                'id' => 11,
                'img' => "E-WEB-Goal-11.png",
                'name' => 'Make cities and human settlements inclusive, safe, resilient and sustainable',
                'short_name' => 'Sustainable Cities and Communities',
                'order' => 11,
                'description' => null,
            ],
            [
                'id' => 12,
                'img' => "E-WEB-Goal-12.png",
                'name' => 'Ensure sustainable consumption and production patterns',
                'short_name' => 'Responsible Consumption and Production',
                'order' => 12,
                'description' => null,
            ],
            [
                'id' => 13,
                'img' => "E-WEB-Goal-13.png",
                'name' => 'Take urgent action to combat climate change and its impacts',
                'short_name' => 'Climate Action',
                'order' => 13,
                'description' => null,
            ],
            [
                'id' => 14,
                'img' => "E-WEB-Goal-14.png",
                'name' => 'Conserve and sustainably use the oceans, seas and marine resources for sustainable development',
                'short_name' => 'Life Below Water',
                'order' => 14,
                'description' => null,
            ],
            [
                'id' => 15,
                'img' => "E-WEB-Goal-15.png",
                'name' => 'Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss',
                'short_name' => 'Life on Land',
                'order' => 15,
                'description' => null,
            ],
            [
                'id' => 16,
                'img' => "E-WEB-Goal-16.png",
                'name' => 'Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels',
                'short_name' => 'Peace, Justice and Strong Institutions',
                'order' => 16,
                'description' => null,
            ],
            [
                'id' => 17,
                'img' => "E-WEB-Goal-17.png",
                'name' => 'Strengthen the means of implementation and revitalize the Global Partnership for Sustainable Development',
                'short_name' => 'Partnerships for the Goals',
                'order' => 17,
                'description' => null,
            ],
        ];

        DB::table('sdgs')->insert($sdgs);
    }
}
