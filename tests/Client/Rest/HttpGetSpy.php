<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpGetSpy extends HttpDummy
{
    public $path;

    public function get(string $path): PromiseInterface
    {
        $this->path = $path;

        return parent::get($path);
    }
}
