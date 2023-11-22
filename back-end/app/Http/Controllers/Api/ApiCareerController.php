<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class ApiCareerController extends Controller
{
    public function index()
    {
        $data = Career::where('is_active', true)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
