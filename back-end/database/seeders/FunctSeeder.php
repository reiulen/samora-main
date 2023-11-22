<?php

namespace Database\Seeders;
use App\Models\Funct;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FunctSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funct::create([
            'name' => 'FICO',
        ]);
        Funct::create([
            'name' => 'IT',
        ]);
        Funct::create([
            'name' => 'LEGAL',
        ]);
    }
}
