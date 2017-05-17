<?php

namespace PhALDan\Discourse\Client;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Test dummy of Guzzle PromiseInterface.
 *
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PromiseDummy implements PromiseInterface
{
    public function then(callable $onFulfilled = null, callable $onRejected = null): PromiseInterface
    {
        return new self();
    }

    public function otherwise(callable $onRejected): PromiseInterface
    {
        return new self();
    }

    public function getState(): string
    {
        return '';
    }

    public function resolve($value): void
    {
    }

    public function reject($reason): void
    {
    }

    public function cancel(): void
    {
    }

    public function wait($unwrap = true)
    {
    }
}
