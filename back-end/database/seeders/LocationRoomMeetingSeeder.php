<?php

namespace Database\Seeders;

use App\Models\LocationRoomMeeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationRoomMeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location_room_meeting = [
            "AF",
            "MSI",
            "SAMORA",
            "SMS",
            "SUJ",
        ];


        foreach ($location_room_meeting as $location_room_meeting) {
            LocationRoomMeeting::create([
                'name' => $location_room_meeting,
            ]);
        }
    }
}
