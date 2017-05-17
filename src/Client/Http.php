<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Interface for handling http request and response.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
interface Http
{
    const METHOD_DELETE = 'DELETE';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';

    const HEADER_ACCEPT = 'Accept';
    const HEADER_CONTENT_TYPE = 'Content-Type';

    const MIME_TYPE_JSON = 'application/json';

    /**
     * @param string $url Url to discourse installation
     *
     * @return Http
     */
    public function setInstance(string $url): Http;

    /**
     * Execute http/https request via DELETE method and only accept json as response.
     *
     * @param string $path
     *
     * @return PromiseInterface
     */
    public function delete(string $path): PromiseInterface;

    /**
     * Execute http/https request via GET method and only accept json as response.
     *
     * @param string $path
     *
     * @return PromiseInterface
     */
    public function get(string $path): PromiseInterface;

    /**
     * Execute http/https request with json encoded data via POST method and only accept json as response.
     *
     * @param string $path
     * @param array  $json
     *
     * @return PromiseInterface
     */
    public function post(string $path, array $json): PromiseInterface;

    /**
     * Execute http/https request with json encoded data via PUT method and only accept json as response.
     *
     * @param string $path
     * @param array  $json
     *
     * @return PromiseInterface
     */
    public function put(string $path, array $json): PromiseInterface;
}
