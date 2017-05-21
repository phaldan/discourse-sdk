<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;

/**
 * Implementation of Http interface with GuzzleHttp.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class GuzzleHttp implements Http
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $url;

    /**
     * Intiate GuzzleHttp Client.
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?? new Client();
    }

    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function setInstance(string $url): Http
    {
        $this->url = $url;

        return $this;
    }

    public function delete(string $path, array $json = []): PromiseInterface
    {
        $headers = [];
        $headers[self::HEADER_ACCEPT] = self::MIME_TYPE_JSON;
        $body = null;

        if (!empty($json)) {
            $headers[self::HEADER_CONTENT_TYPE] = self::MIME_TYPE_JSON;
            $body = json_encode($json);
        }

        $request = new Request(self::METHOD_DELETE, $this->url.$path, $headers, $body);

        return $this->client->sendAsync($request);
    }

    public function get(string $path, array $parameters = []): PromiseInterface
    {
        $queryString = http_build_query($parameters);
        $uri = $this->url.$path.(empty($queryString) ? '' : '?'.$queryString);
        $headers = [
          self::HEADER_ACCEPT => self::MIME_TYPE_JSON,
        ];
        $request = new Request(self::METHOD_GET, $uri, $headers);

        return $this->client->sendAsync($request);
    }

    public function post(string $path, array $json): PromiseInterface
    {
        $headers = [
            self::HEADER_ACCEPT => self::MIME_TYPE_JSON,
            self::HEADER_CONTENT_TYPE => self::MIME_TYPE_JSON,
        ];
        $request = new Request(self::METHOD_POST, $this->url.$path, $headers, json_encode($json));

        return $this->client->sendAsync($request);
    }

    public function put(string $path, array $json): PromiseInterface
    {
        $headers = [
          self::HEADER_ACCEPT => self::MIME_TYPE_JSON,
          self::HEADER_CONTENT_TYPE => self::MIME_TYPE_JSON,
        ];
        $request = new Request(self::METHOD_PUT, $this->url.$path, $headers, json_encode($json));

        return $this->client->sendAsync($request);
    }
}
