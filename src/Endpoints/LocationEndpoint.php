<?php

namespace WDevs\LaravelSerpstack\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;

class LocationEndpoint extends BaseEndpoint
{

    public function __construct(PendingRequest $client)
    {
        parent::__construct($client);
        $this->setEndpoint('locations');
    }


    /**
     * @param string $query
     * @param array  $parameters
     *
     * @return array
     * @throws RequestException
     */
    public function locationFor($query, array $parameters = [])
    {
        $parameters['query'] = $query;

        return $this->get($this->endpoint, $parameters);
    }
}
