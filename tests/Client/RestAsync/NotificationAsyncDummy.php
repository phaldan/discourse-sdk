<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class NotificationAsyncDummy extends PromiseFactoryStub implements NotificationAsync
{
    public function list(): PromiseInterface
    {
        return $this->createPromise();
    }
}
