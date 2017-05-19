<?php

namespace PhALDan\Discourse\Client\Rest;

use PhALDan\Discourse\Client\Http;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
abstract class HttpClient
{
    /**
     * @var Http
     */
    private $client;

    /**
     * @param Http $client client for handling http requests
     */
    public function __construct(Http $client)
    {
        $this->client = $client;
    }

    /**
     * @return Http
     */
    protected function client(): Http
    {
        return $this->client;
    }
}
