<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PostAsyncDummy extends PromiseFactoryStub implements PostAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function like(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function single(int $id): PromiseInterface
    {
        return $this->createPromise();
    }

    public function unlike(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
