<?php

namespace PhALDan\Discourse\Client\Rest;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\Http;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpDummy implements Http
{
    public function setInstance(string $url): Http
    {
        return $this;
    }

    public function delete(string $path, array $json = []): PromiseInterface
    {
        return $this->createPromise();
    }

    public function get(string $path): PromiseInterface
    {
        return $this->createPromise();
    }

    public function post(string $path, array $json): PromiseInterface
    {
        return $this->createPromise();
    }

    public function put(string $path, array $json): PromiseInterface
    {
        return $this->createPromise();
    }

    private function createPromise()
    {
        $promise = new Promise();
        $promise->resolve(null);

        return $promise;
    }
}
