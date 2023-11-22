<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GalleryResource;

class ApiGalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::all();

        return response()->json([
            'status' => 'success',
            'data' => GalleryResource::collection($data)
        ]);
    }
}
