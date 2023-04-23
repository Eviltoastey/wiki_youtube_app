<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class YoutubeVideo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $nextPageToken = $this->resource['nextPageToken'] ?? 'default';
        $previousPageToken = $this->resource['previousPageToken'] ?? 'default';

        return [
            'title' => $this->resource['snippet']['title'],
            'description' => $this->resource['snippet']['description'],
            'thumbnails' => $this->resource['snippet']['thumbnails']['high'],
            'url' => 'https://www.youtube.com/watch?v=' . $this->resource['id']['videoId'],
            'links' => [
                'nextPage' => url()->current() . '/' . $nextPageToken,
                'previousPage' => url()->current() . '/' . $previousPageToken,
            ]
        ];
    }
}
