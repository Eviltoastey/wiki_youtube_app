<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Wikipedia extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->resource['title'],
            'description' => $this->resource['extract'],
        ];
    }
}
