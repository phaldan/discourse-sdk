<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpPostSpy extends HttpDummy
{
    public $path;
    public $json;

    public function post(string $path, array $json): PromiseInterface
    {
        $this->path = $path;
        $this->json = $json;

        return parent::post($path, $json);
    }
}
