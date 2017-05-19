<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpDeleteSpy extends HttpDummy
{
    public $path;
    public $json;

    public function delete(string $path, array $json = []): PromiseInterface
    {
        $this->path = $path;
        $this->json = $json;

        return parent::delete($path, $json);
    }
}
