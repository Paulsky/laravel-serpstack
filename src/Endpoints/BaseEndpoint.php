<?php

namespace WDevs\LaravelSerpstack\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;

class BaseEndpoint
{

    private PendingRequest $client;

    protected $endpoint;

    /**
     * @var \Illuminate\Config\Repository
     */
    private $apiKey;


    /**
     * BaseEndpoint constructor.
     *
     * @param PendingRequest $client
     */
    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
        $this->apiKey = config('serpstack.api_key', null);
    }


    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }


    /**
     * @param string $url
     * @param null   $params
     *
     * @return array
     * @throws RequestException
     */
    public function get($url = '/', $params = null)
    {
        if ( ! is_array($params)) {
            $params = [];
        }

        if ( ! isset($params['access_key'])) {
            $params['access_key'] = $this->apiKey;
        }

        $response = $this->client->get($url, $params);

        // Throw an exception if a client or server error occurred...
        $response->throw();

        return $response->json();
    }

}
