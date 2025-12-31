<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionSeeder extends Seeder
{
    public function run(): void
    {
        Division::insert([
            [
                'name' => 'IT',
                'description' => 'Divisi Teknologi Informasi',
            ],
            [
                'name' => 'HRD',
                'description' => 'Divisi Sumber Daya Manusia',
            ],
            [
                'name' => 'Finance',
                'description' => 'Divisi Keuangan',
            ],
        ]);
    }
}
