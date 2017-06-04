<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class UserAsyncDummy extends PromiseFactoryStub implements UserAsync
{
    public function create(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function directoryItems(array $parameters): PromiseInterface
    {
        return $this->createPromise();
    }

    public function list(string $flag, array $parameters): PromiseInterface
    {
        return $this->createPromise();
    }

    public function single(string $username): PromiseInterface
    {
        return $this->createPromise();
    }

    public function updateAvatar(string $username, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function updateEmail(string $username, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
