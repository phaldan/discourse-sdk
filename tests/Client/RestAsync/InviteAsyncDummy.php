<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class InviteAsyncDummy extends PromiseFactoryStub implements InviteAsync
{
    public function email(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function createLink(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }

    public function createToken(array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
