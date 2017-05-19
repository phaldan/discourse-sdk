<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpPutSpy extends HttpDummy
{
    public $path;
    public $json;

    public function put(string $path, array $json): PromiseInterface
    {
        $this->path = $path;
        $this->json = $json;

        return parent::get($path);
    }
}
