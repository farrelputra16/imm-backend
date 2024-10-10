<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Human Resources',
            'Finance',
            'Marketing',
            'Sales',
            'Customer Service',
            'Research and Development',
            'Information Technology',
            'Operations',
            'Logistics',
            'Legal',
            'Public Relations',
            'Procurement',
            'Quality Assurance',
            'Production',
            'Administration',
            'Business Development',
            'Engineering',
            'Design',
            'Security',
            'Training and Development',
            'Health and Safety',
            'Environmental',
            'Corporate Strategy',
            'Investor Relations',
            'Compliance',
            'Internal Audit',
            'Corporate Communications',
            'Facilities Management',
            'Supply Chain Management',
            'Project Management',
            'Data Analysis',
            'Content Management',
            'Social Media',
            'E-commerce',
            'Customer Experience',
            'Innovation',
            'Product Management',
            'Event Management',
            'Technical Support',
            'Network Operations',
            'Infrastructure',
            'Cloud Services',
            'UX/UI Design',
            'Creative Services',
            'Media Relations',
            'Regulatory Affairs',
            'Talent Acquisition',
            'Compensation and Benefits',
            'Employee Relations',
            'Diversity and Inclusion',
            'Learning and Development',
            'Change Management',
            'Crisis Management',
            'Risk Management',
            'Sustainability',
            'Corporate Social Responsibility',
            'Legal Compliance',
            'Patents and Trademarks',
            'Export/Import',
            'Franchise Management',
            'Vendor Management',
            'Customer Insights',
            'Field Operations',
            'Technical Writing',
            'Knowledge Management',
            'Digital Transformation',
            'Artificial Intelligence',
            'Blockchain Development',
            'Cybersecurity',
            'Mobile Development',
        ];

        foreach ($departments as $department) {
            DB::table('departements')->insert([
                'name' => $department,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}