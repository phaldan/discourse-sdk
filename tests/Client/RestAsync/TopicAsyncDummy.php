<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TopicAsyncDummy extends PromiseFactoryStub implements TopicAsync
{
    public function createScheduled(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function delete(int $id): PromiseInterface
    {
        return $this->createPromise();
    }

    public function invite(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function latest(array $parameters = []): PromiseInterface
    {
        return $this->createPromise();
    }

    public function notification(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function single(int $id): PromiseInterface
    {
        return $this->createPromise();
    }

    public function top(): PromiseInterface
    {
        return $this->createPromise();
    }

    public function topFiltered(string $flag): PromiseInterface
    {
        return $this->createPromise();
    }

    public function update(string $slug, int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function updateScheduled(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function updateStatus(int $id, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
