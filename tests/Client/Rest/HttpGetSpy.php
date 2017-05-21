<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpGetSpy extends HttpDummy
{
    public $path;
    public $parameters;

    public function get(string $path, array $parameters = []): PromiseInterface
    {
        $this->path = $path;
        $this->parameters = $parameters;

        return parent::get($path);
    }
}
