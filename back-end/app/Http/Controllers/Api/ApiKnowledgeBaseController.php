<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KnowledgeBase;
use App\Http\Resources\KnowledgeBaseResource;

class ApiKnowledgeBaseController extends Controller
{
    public function index ()
    {
        $data = KnowledgeBase::all();

        return response()->json([
            'status' => 'success',
            'data' => KnowledgeBaseResource::collection($data)
            ]);
    }
}
