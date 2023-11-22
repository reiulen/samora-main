<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuickLink;
use App\Http\Resources\QuickLinkResource;

class ApiQuickLinkController extends Controller
{
    public function index ()
    {
        $data = QuickLink::all();

        return response()->json([
            'status' => 'success',
            'data' => QuickLinkResource::collection($data)
            ]);
    }
}
