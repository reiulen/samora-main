<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KnowledgeBaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "legal" => $this->legal,
            "title" => $this->title,
            "path" => url('storage/knowledge-base/' . $this->file)
        ];
    }
}
