<?php

namespace App\Http\Controllers;

use App\Models\RoomMeeting;
use Illuminate\Http\Request;

class RoomMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getBookRoom(Request $request)
    {
        $room_meeting = RoomMeeting::with(['locationRoomMeeting', 'bookingRoomMeeting'])
                                    ->orderBy('name', 'asc')
                                    ->filter($request)
                                    // ->whereHas('bookingRoomMeeting', function ($query) use ($request) {
                                    //     $query->where('date', $request->date);
                                    // })
                                    ->get();

        return response()->json([
            'status' => true,
            'data' => $room_meeting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = RoomMeeting::with(['locationRoomMeeting', 'bookingRoomMeeting'])
                            ->where('id', $id)
                            ->first();
        if(!$data) return response()->json([
            'status' => false,
            'message' => 'Data not found'
        ], 404);

        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
