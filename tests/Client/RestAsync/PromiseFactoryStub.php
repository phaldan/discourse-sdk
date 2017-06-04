<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PromiseFactoryStub
{
    protected function createPromise(): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
