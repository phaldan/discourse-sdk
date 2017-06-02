<?php

namespace PhALDan\Discourse\Client\RestAsync;

use PhALDan\Discourse\Client\HttpAdapter;
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
     * @param string      $url
     * @param HttpAdapter $client client for handling http requests
     */
    public function __construct(string $url, HttpAdapter $client)
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
