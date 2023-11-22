<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CorporateCommunication;
use App\Http\Resources\CorporateCommunicationResource;

class ApiCorporateCommunicationController extends Controller
{
    public function index()
    {
        $data = CorporateCommunication::all();
    
        return response()->json([
                'status' => 'success',
                'data' => CorporateCommunicationResource::collection($data)
            ]);
    }
}
