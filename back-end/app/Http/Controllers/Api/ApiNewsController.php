<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class ApiNewsController extends Controller
{
    public function index(Request $request)
    {
        $data = News::where('published', true)
            ->when($request->query('take'), function ($query) use ($request) {
                return $query->limit($request->query('take'));
            })
            ->latest('updated_at')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => NewsResource::collection($data)
        ]);
    }

    public function detail($slug)
    {
        try {
            $data = News::whereSlug($slug)->where('published', true)->first();
            if (!$data) throw new \Exception('News not found');
            return response()->json([
                'status' => 'success',
                'data' => new NewsResource($data)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
