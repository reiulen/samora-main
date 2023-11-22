<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CorporateDocument;
use App\Http\Resources\CorporateDocumentResource;

class ApiCorporateDocument extends Controller
{
    public function index()
    {
        $data = CorporateDocument::all();
    
        return response()->json([
                'status' => 'success',
                'data' => CorporateDocumentResource::collection($data)
            ]);
    }
}
