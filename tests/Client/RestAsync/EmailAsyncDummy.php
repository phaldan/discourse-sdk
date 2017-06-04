<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class EmailAsyncDummy extends PromiseFactoryStub implements EmailAsync
{
    public function list(string $action, array $parameters = []): PromiseInterface
    {
        return $this->createPromise();
    }
}
