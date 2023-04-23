<?php

namespace App\Services;

use App\Enums\Country;
use App\Http\Resources\Wikipedia;
use Illuminate\Support\Facades\Http;

class WikipediaService
{
    /**
     * The API base URL.
     *
     * @var string
     */
    protected $baseUrl = 'https://en.wikipedia.org/api/rest_v1/page/summary/';

    public function getFirstParagraphByCountry($country): array
    {
        $response = Http::get($this->baseUrl . urlencode($country));

        if ($response->failed()) {
            return null;
        }

        $json = $response->json();

        if (!isset($json['extract'])) {
            return null;
        }

        return Wikipedia::make($json)->resolve();
    }
}
