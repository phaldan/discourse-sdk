<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PrivateMessageAsyncDummy extends PromiseFactoryStub implements PrivateMessageAsync
{
    public function inbox(string $username): PromiseInterface
    {
        return $this->createPromise();
    }

    public function sent(string $username): PromiseInterface
    {
        return $this->createPromise();
    }

    public function archive(string $username): PromiseInterface
    {
        return $this->createPromise();
    }

    public function group(string $username, string $group): PromiseInterface
    {
        return $this->createPromise();
    }

    public function groupArchive(string $username, string $group): PromiseInterface
    {
        return $this->createPromise();
    }
}
