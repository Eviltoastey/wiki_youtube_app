<?php

namespace App\Http\Controllers;

use App\Services\VideoService;

class VideoController extends Controller
{
    protected $videoService;

    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }

    public function getTopVideos($pageToken = null) {
        return json_encode($this->videoService->getAllVideos($pageToken));
    }

    public function getTopVideosByCountry($countryId, $pageToken = null) {
        return json_encode($this->videoService->getVideosByCountry($countryId, $pageToken));
    }
}
