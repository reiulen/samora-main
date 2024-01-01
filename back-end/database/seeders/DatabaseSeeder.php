<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CorporateCommunication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // CompanySeeder::class,
            // FunctSeeder::class,
            // TypeSeeder::class,
            // CorporateCommunicationSeeder::class,
            // NewsSeeder::class,
            // UserSeeder::class,
            // LocationRoomMeetingSeeder::class,
            RoomMeetingSeeder::class,
        ]);
    }
}
