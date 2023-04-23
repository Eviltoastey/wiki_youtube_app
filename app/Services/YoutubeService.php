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

    public function searchVideos(string $regionCode = null, string $pageToken = null) : array
    {
        $response = Http::get($this->baseUrl.'/search'.implode([
                '?key='.env('YOUTUBE_API_KEY'),
                '&part=snippet',
                '&type=video',
                '$chart=mostPopulair',
                '&maxResults=3',
                '&regionCode=' . $regionCode,
                '&pageToken=' . $pageToken,
            ])
        );

        if ($response->failed()) {
            return null;
        }

        $data = json_decode($response->getBody(), true);

        if (!isset($data['items'])) {
            return null;
        }

        // Ok I know this is hacky but for now I couldnt find any other way of adding pagination using youtube.
        // I've spend too much time out finding how. 0.0
        $data['items'][0]['nextPageToken'] = $data['nextPageToken'];
        $data['items'][0]['previousPageToken'] = $pageToken;

        return YoutubeVideo::collection($data['items'])->resolve();
    }
}
