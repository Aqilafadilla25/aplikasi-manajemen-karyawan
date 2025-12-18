<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'John Doe',
            'position' => 'Software Engineer',
            'department' => 'IT',
            'salary' => 50000.00,
            'status' => 'active',
            'hire_date' => '2023-01-15',
            'email' => 'john.doe@example.com',
            'phone' => '123-456-7890',
        ]);

        Employee::create([
            'name' => 'Jane Smith',
            'position' => 'HR Manager',
            'department' => 'Human Resources',
            'salary' => 60000.00,
            'status' => 'active',
            'hire_date' => '2022-05-20',
            'email' => 'jane.smith@example.com',
            'phone' => '098-765-4321',
        ]);

        Employee::create([
            'name' => 'Bob Johnson',
            'position' => 'Accountant',
            'department' => 'Finance',
            'salary' => 55000.00,
            'status' => 'active',
            'hire_date' => '2021-11-10',
            'email' => 'bob.johnson@example.com',
            'phone' => '555-123-4567',
        ]);

        Employee::create([
            'name' => 'Alice Brown',
            'position' => 'Marketing Specialist',
            'department' => 'Marketing',
            'salary' => 45000.00,
            'status' => 'inactive',
            'hire_date' => '2020-03-05',
            'email' => 'alice.brown@example.com',
            'phone' => '777-888-9999',
        ]);

        Employee::create([
            'name' => 'Charlie Wilson',
            'position' => 'Sales Representative',
            'department' => 'Sales',
            'salary' => 40000.00,
            'status' => 'active',
            'hire_date' => '2024-07-01',
            'email' => 'charlie.wilson@example.com',
            'phone' => '111-222-3333',
        ]);
    }
}
