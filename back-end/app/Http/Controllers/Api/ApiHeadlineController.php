<?php

namespace App\Http\Controllers\Api;

use App\Models\Headline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HeadlineResource;

class ApiHeadlineController extends Controller
{
    public function index ()
    {
        $data = Headline::latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => HeadlineResource::collection($data)
        ]);
    }
}
