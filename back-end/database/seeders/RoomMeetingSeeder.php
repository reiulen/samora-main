<?php

namespace Database\Seeders;

use App\Models\RoomMeeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomMeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $room = [
            [
                'name' => 'Curing Room',
                'location_room_meeting_id' => 1,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Afinasi Room',
                'location_room_meeting_id' => 1,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Bagging Room',
                'location_room_meeting_id' => 1,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Boiling Room',
                'location_room_meeting_id' => 1,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Melting Room',
                'location_room_meeting_id' => 1,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Training Room',
                'location_room_meeting_id' => 1,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Team Work Room',
                'location_room_meeting_id' => 1,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Respect 1',
                'location_room_meeting_id' => 2,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Respect 2',
                'location_room_meeting_id' => 2,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Accountable',
                'location_room_meeting_id' => 2,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Continuous Learning Room',
                'location_room_meeting_id' => 2,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Strive For Excelence Room',
                'location_room_meeting_id' => 2,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'ICSTAR (Capacity 10 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Board Room (Capacity 14 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 14,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Respect (Capacity 4 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 4,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Thamrin (Capacity 6 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 6,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Accountable (Capacity 10 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Team Work (Capacity 10 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'SE - Strive For Excellence (Capacity 10 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Integrity (Capacity 4 PAX)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 4,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'CL - Continuous Learning (Capacity 4 PAx)',
                'location_room_meeting_id' => 3,
                'description' => null,
                'capacity' => 4,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'R. Rapat Bayan',
                'location_room_meeting_id' => 4,
                'description' => null,
                'capacity' => 10,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'R. Rapat Dompu',
                'location_room_meeting_id' => 4,
                'description' => null,
                'capacity' => 20,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'R. Rapat Langko',
                'location_room_meeting_id' => 4,
                'description' => null,
                'capacity' => 15,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'R. Rapat Pejanggik',
                'location_room_meeting_id' => 4,
                'description' => null,
                'capacity' => 15,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'R. Rapat Pekat',
                'location_room_meeting_id' => 4,
                'description' => null,
                'capacity' => 20,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'R. Rapat Sanggar',
                'location_room_meeting_id' => 4,
                'description' => null,
                'capacity' => 20,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'R. Rapat Selaparang',
                'location_room_meeting_id' => 4,
                'description' => null,
                'capacity' => 30,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Omega Room',
                'location_room_meeting_id' => 5,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Andromeda Room',
                'location_room_meeting_id' => 5,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Supernova Room',
                'location_room_meeting_id' => 5,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Sun Flowers Room',
                'location_room_meeting_id' => 5,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
            [
                'name' => 'Board Room',
                'location_room_meeting_id' => 5,
                'description' => null,
                'capacity' => null,
                'minimum_time' => '00:00',
                'maximum_time' => '23:45',
            ],
        ];


        foreach ($room as $room) {
            RoomMeeting::create($room);
        }

    }
}
