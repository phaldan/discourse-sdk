<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class ApiKeyAuth implements Authentication
{
    const QUERY_API_TOKEN = 'api_key';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var Http
     */
    private $http;

    /**
     * ApiKeyAuth constructor.
     *
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setHttp(Http $http): Authentication
    {
        $this->http = $http;

        return $this;
    }

    public function send(RequestInterface $request): PromiseInterface
    {
        $uri = $request->getUri();
        $parameters = [];
        parse_str($uri->getQuery(), $parameters);
        $parameters[self::QUERY_API_TOKEN] = $this->apiKey;
        $query = http_build_query($parameters);

        return $this->http->send($request->withUri($uri->withQuery($query)));
    }
}
