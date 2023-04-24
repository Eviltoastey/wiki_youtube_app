<?php

namespace App\Services;

use App\Enums\Country;
use BenSampo\Enum\Exceptions\InvalidEnumKeyException;
use Illuminate\Support\Facades\Cache;

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
        $cacheKey = "youtube.popular.all";

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            // Return cached data
            return Cache::get($cacheKey);
        }

        foreach (Country::getInstances() as $countryEnum) {
            //todo: can make this into a resource too (video).
            array_push($videos, [
                'country_info' => $this->wikipediaService->getFirstParagraphByCountry($countryEnum->value),
                'video' => $this->youtubeService->searchVideos($countryEnum->key)
            ]);
        }

        Cache::put($cacheKey, $videos, now()->addHours(24));

        return $videos;
    }

    public function getVideosByCountry($country): array
    {
        $countryEnum = Country::fromValue($country);
        $cacheKey = "youtube.popular.{$countryEnum}";

        // Check if data exists in cache
        if (Cache::has($cacheKey)) {
            // Return cached data
            return Cache::get($cacheKey);
        }

        $countryVideos = [
            'country_info' => $this->wikipediaService->getFirstParagraphByCountry($countryEnum->value),
            'video' => $this->youtubeService->searchVideos($countryEnum->key)
        ];

        Cache::put($cacheKey, $countryVideos, now()->addHours(24));

        return $countryVideos;
    }
}
