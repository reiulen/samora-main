<?php

namespace Database\Seeders;
use App\Models\Company;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'PT Samora Usaha Makmur',
        ]);
        Company::create([
            'name' => 'PT Andalan Furnindo',
        ]);
        Company::create([
            'name' => 'PT Sentra Usahatama Jaya',
        ]);
    }
}
