<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class ApiKeyAuth implements Authentication
{
    const QUERY_API_USERNAME = 'api_username';
    const QUERY_API_KEY = 'api_key';

    /**
     * @var string
     */
    private $apiUsername;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var HttpAdapter
     */
    private $http;

    /**
     * ApiKeyAuth constructor.
     *
     * @param string $apiUsername
     * @param string $apiKey
     */
    public function __construct(string $apiUsername, string $apiKey)
    {
        $this->apiUsername = $apiUsername;
        $this->apiKey = $apiKey;
    }

    public function setHttp(HttpAdapter $http): Authentication
    {
        $this->http = $http;

        return $this;
    }

    public function send(RequestInterface $request): PromiseInterface
    {
        $uri = $request->getUri();
        $parameters = [];
        parse_str($uri->getQuery(), $parameters);
        $parameters[self::QUERY_API_USERNAME] = $this->apiUsername;
        $parameters[self::QUERY_API_KEY] = $this->apiKey;
        $query = http_build_query($parameters);

        return $this->http->send($request->withUri($uri->withQuery($query)));
    }
}
