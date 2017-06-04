<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TagGroupAsyncDummy extends PromiseFactoryStub implements TagGroupAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function list(): PromiseInterface
    {
        return $this->createPromise();
    }

    public function single(int $id): PromiseInterface
    {
        return $this->createPromise();
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
