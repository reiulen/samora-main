<?php

namespace App\Http\Controllers;

use App\Models\LocationRoomMeeting;
use Illuminate\Http\Request;

class LocationRoomMeetingController extends Controller
{
    public function index()
    {
        $location_room_meeting = LocationRoomMeeting::orderBy('name', 'asc')
                                                      ->get();

        return response()->json([
            'status' => true,
            'data' => $location_room_meeting
        ], 200);
    }
}
