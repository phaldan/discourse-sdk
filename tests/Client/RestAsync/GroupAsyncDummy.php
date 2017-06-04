<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class GroupAsyncDummy extends PromiseFactoryStub implements GroupAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function delete(int $id): PromiseInterface
    {
        return $this->createPromise();
    }

    public function list(array $parameters = []): PromiseInterface
    {
        return $this->createPromise();
    }

    public function single(string $name): PromiseInterface
    {
        return $this->createPromise();
    }

    public function addMember(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function deleteMember(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
