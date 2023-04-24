<?php

namespace App\Services;

use App\Http\Resources\YoutubeVideo;
use Illuminate\Support\Facades\Http;

class YoutubeService
{
    /**
     * The API base URL.
     *
     * @var string
     */
    protected $baseUrl = 'https://www.googleapis.com/youtube/v3';

    public function searchVideos(string $regionCode = null): array
    {
        $response = Http::get(
            $this->baseUrl . '/search' . implode([
                '?key=' . env('YOUTUBE_API_KEY'),
                '&part=snippet',
                '&type=video',
                '$chart=mostPopulair',
                '&maxResults=10',
                '&regionCode=' . $regionCode
            ])
        );

        if ($response->failed()) {
            return null;
        }

        $data = json_decode($response->getBody(), true);

        if (!isset($data['items'])) {
            return null;
        }

        return YoutubeVideo::collection($data['items'])->resolve();
    }
}
