<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TagAsyncDummy extends PromiseFactoryStub implements TagAsync
{
    public function list(): PromiseInterface
    {
        return $this->createPromise();
    }

    public function single(string $name): PromiseInterface
    {
        return $this->createPromise();
    }
}
