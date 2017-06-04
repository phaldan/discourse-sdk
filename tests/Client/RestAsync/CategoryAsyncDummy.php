<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class CategoryAsyncDummy extends PromiseFactoryStub implements CategoryAsync
{
    public function list(array $parameters = []): PromiseInterface
    {
        return $this->createPromise();
    }

    public function single(int $id): PromiseInterface
    {
        return $this->createPromise();
    }

    public function singleBySlug(string $slug): PromiseInterface
    {
        return $this->createPromise();
    }

    public function create(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
