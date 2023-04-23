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

    public function getTopVideos() {
        return json_encode($this->videoService->getAllVideos());
    }

    public function getTopVideosByCountry($countryId) {
        return json_encode($this->videoService->getVideosByCountry($countryId));
    }
}
