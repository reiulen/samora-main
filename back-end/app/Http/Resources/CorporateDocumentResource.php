<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CorporateDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'function' => $this->function,
            'company' => $this->company,
            'type' => $this->type,
            'title' => $this->title,
            'path' => url('storage/corporate-document/' . $this->path)
        ];
    }
}
