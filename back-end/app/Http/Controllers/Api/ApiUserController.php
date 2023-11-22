<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class ApiUserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return response()->json([
            'status' => 'success',
            'data' => UserResource::collection($data)
        ]);
    }
}
