<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\HttpAdapter;
use Psr\Http\Message\RequestInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class HttpAdapterDummy implements HttpAdapter
{
    public function send(RequestInterface $request): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(null);

        return $promise;
    }
}
