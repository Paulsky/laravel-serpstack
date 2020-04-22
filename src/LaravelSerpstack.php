<?php

namespace WDevs\LaravelSerpstack;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use WDevs\LaravelSerpstack\Endpoints\LocationEndpoint;
use WDevs\LaravelSerpstack\Endpoints\SearchEndpoint;

class LaravelSerpstack
{

    /**
     * @var PendingRequest
     */
    private PendingRequest $client;

    public static $API_ROUTE = 'api.serpstack.com/';

    /**
     * @var SearchEndpoint
     */
    private SearchEndpoint $searchEndpoint;

    /**
     * @var LocationEndpoint
     */
    private LocationEndpoint $locationEndpoint;


    public function __construct()
    {
        $secure = config('serpstack.secure', true);
        if ($secure) {
            self::$API_ROUTE = 'https://'.self::$API_ROUTE;
        }

        $this->client = Http::withOptions([
            // Base URI is used with relative requests
            'base_uri' => self::$API_ROUTE,
            'protocal'
        ]);


    }


    /**
     * @return SearchEndpoint
     */
    public function search(): SearchEndpoint
    {
        if ( ! isset($this->searchEndpoint) || is_null($this->searchEndpoint)) {
            $this->setSearchEndpoint(new SearchEndpoint($this->client));
        }

        return $this->searchEndpoint;
    }


    /**
     * @param SearchEndpoint $endpoint
     */
    private function setSearchEndpoint(SearchEndpoint $endpoint)
    {
        $this->searchEndpoint = $endpoint;
    }


    /**
     * @return LocationEndpoint
     */
    public function location(): LocationEndpoint
    {
        if ( ! isset($this->locationEndpoint) || is_null($this->locationEndpoint)) {
            $this->setLocationEndpoint(new LocationEndpoint($this->client));
        }

        return $this->locationEndpoint;
    }


    /**
     * @param LocationEndpoint $endpoint
     */
    private function setLocationEndpoint(LocationEndpoint $endpoint)
    {
        $this->locationEndpoint = $endpoint;
    }
}
