<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpMethods
{
    const METHOD_DELETE = 'DELETE';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';

    const HEADER_ACCEPT = 'Accept';
    const HEADER_CONTENT_TYPE = 'Content-Type';

    const MIME_TYPE_JSON = 'application/json';

    /**
     * @var string
     */
    private $url = '';

    /**
     * @var HttpAdapter
     */
    private $http;

    /**
     * HttpHelper constructor.
     *
     * @param HttpAdapter $http
     */
    public function __construct(HttpAdapter $http)
    {
        $this->http = $http;
    }

    /**
     * Return current instance of Http.
     *
     * @return HttpAdapter
     */
    public function client(): HttpAdapter
    {
        return $this->http;
    }

    /**
     * @param string $url Url to discourse installation
     *
     * @return HttpMethods
     */
    public function setInstance(string $url): HttpMethods
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Execute http/https request via DELETE method and only accept json as response.
     *
     * @param string $path
     * @param array  $json
     *
     * @return PromiseInterface
     */
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

        return $this->http->send($request);
    }

    /**
     * Execute http/https request via GET method and only accept json as response.
     *
     * @param string $path
     * @param array  $parameters
     *
     * @return PromiseInterface
     */
    public function get(string $path, array $parameters = []): PromiseInterface
    {
        $queryString = http_build_query($parameters);
        $uri = $this->url.$path.(empty($queryString) ? '' : '?'.$queryString);
        $headers = [
          self::HEADER_ACCEPT => self::MIME_TYPE_JSON,
        ];
        $request = new Request(self::METHOD_GET, $uri, $headers);

        return $this->http->send($request);
    }

    /**
     * Execute http/https request with json encoded data via POST method and only accept json as response.
     *
     * @param string $path
     * @param array  $json
     *
     * @return PromiseInterface
     */
    public function post(string $path, array $json): PromiseInterface
    {
        $headers = [
          self::HEADER_ACCEPT => self::MIME_TYPE_JSON,
          self::HEADER_CONTENT_TYPE => self::MIME_TYPE_JSON,
        ];
        $request = new Request(self::METHOD_POST, $this->url.$path, $headers, json_encode($json));

        return $this->http->send($request);
    }

    /**
     * Execute http/https request with json encoded data via PUT method and only accept json as response.
     *
     * @param string $path
     * @param array  $json
     *
     * @return PromiseInterface
     */
    public function put(string $path, array $json): PromiseInterface
    {
        $headers = [
          self::HEADER_ACCEPT => self::MIME_TYPE_JSON,
          self::HEADER_CONTENT_TYPE => self::MIME_TYPE_JSON,
        ];
        $request = new Request(self::METHOD_PUT, $this->url.$path, $headers, json_encode($json));

        return $this->http->send($request);
    }
}
