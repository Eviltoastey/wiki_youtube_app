<?php

namespace App\Services;

use App\Enums\Country;
use BenSampo\Enum\Exceptions\InvalidEnumKeyException;

class VideoService
{
    protected $youtubeService;
    protected $wikipediaService;

    public function __construct(YoutubeService $youtubeService, WikipediaService $wikipediaService)
    {
        $this->youtubeService = $youtubeService;
        $this->wikipediaService = $wikipediaService;
    }

    public function getAllVideos(): array
    {
        $videos = [];

        foreach (Country::getInstances() as $countryEnum) {
            //todo: can make this into a resource too (video).
            array_push($videos, [
                'country_info' => $this->wikipediaService->getFirstParagraphByCountry($countryEnum->value),
                'video' => $this->youtubeService->searchVideos($countryEnum->key)
            ]);
        }

        return $videos;
    }

    public function getVideosByCountry($country): array
    {
        $countryEnum = Country::fromValue($country);

        return [
            'country_info' => $this->wikipediaService->getFirstParagraphByCountry($countryEnum->value),
            'video' => $this->youtubeService->searchVideos($countryEnum->key)
        ];
    }
}
