<?php

namespace App\Http\Controllers\Api;

use App\Models\Leader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeaderResource;

class ApiLeaderController extends Controller
{
    public function index ()
    {
        $data = Leader::all();

        return response()->json([
            'status' => 'success',
            'data' => LeaderResource::collection($data)
        ]);
    }
}
