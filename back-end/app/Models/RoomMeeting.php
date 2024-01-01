<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMeeting extends Model
{
    use HasFactory;
    protected $gurded = ['id'];

    public function locationRoomMeeting()
    {
        return $this->belongsTo(LocationRoomMeeting::class, 'location_room_meeting_id');
    }

    public function bookingRoomMeeting()
    {
        return $this->hasMany(BookingMeetingRoom::class, 'room_meeting_id');
    }

    public function scopeFilter($query, $request)
    {
       return $query->when($request->keyword, function ($query) use ($request) {
           $query->where('name', 'like', "%{$request->keyword}%");
       })->when($request->location ?? false, function ($query) use ($request) {
           $query->where('location_room_meeting_id', $request->location);
       });
    }
}
