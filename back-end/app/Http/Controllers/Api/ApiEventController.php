<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiEventController extends Controller
{
    public function index()
    {
        $data = Event::all();
        return response()->json([
            'status' => 'success',
            'data' => EventResource::collection($data)
        ]);
    }
}
