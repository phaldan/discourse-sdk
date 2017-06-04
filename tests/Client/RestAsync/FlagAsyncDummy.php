<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class FlagAsyncDummy extends PromiseFactoryStub implements FlagAsync
{
    public function list(string $type, array $parameters = []): PromiseInterface
    {
        return $this->createPromise();
    }
}
