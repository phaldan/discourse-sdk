<?php

namespace PhALDan\Discourse\Client\Rest;

use PhALDan\Discourse\Client\Http;
use PhALDan\Discourse\Client\HttpMethods;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
abstract class HttpClient
{
    /**
     * @var HttpMethods
     */
    private $client;

    /**
     * @param string $url
     * @param Http   $client client for handling http requests
     */
    public function __construct(string $url, Http $client)
    {
        $this->client = (new HttpMethods($client))->setInstance($url);
    }

    /**
     * @return HttpMethods
     */
    protected function client(): HttpMethods
    {
        return $this->client;
    }
}
