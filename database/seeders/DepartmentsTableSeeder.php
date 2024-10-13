<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Sales',
            'Marketing',
            'Finance',
            'Operations',
            'HR', // Human Resources
            'IT', // Information Technology
            'Customer Service',
            'Procurement',
            'SCM', // Supply Chain Management
            'Logistics',
            'Admin', // Administration
            'Facilities Management',
            'Corporate Communications',
            'Investor Relations', // Investor Relations
            'R&D', // Research and Development
            'Product Management',
            'Engineering',
            'Design',
            'Compliance',
            'Internal Audit',
            'Risk Management',
            'Legal',
            'T&D', // Training and Development
            'TA', // Talent Acquisition
            'C&B', // Compensation and Benefits
            'Employee Relations',
            'Corporate Strategy',
            'BD', // Business Development
            'Innovation',
            'DT', // Digital Transformation
        ];

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
