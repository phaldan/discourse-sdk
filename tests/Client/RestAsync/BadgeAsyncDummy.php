<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class BadgeAsyncDummy extends PromiseFactoryStub implements BadgeAsync
{
    public function list(): PromiseInterface
    {
        return $this->createPromise();
    }

    public function create(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function delete(int $id): PromiseInterface
    {
        return $this->createPromise();
    }
}
