<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class BackupAsyncDummy extends PromiseFactoryStub implements BackupAsync
{
    public function list(): PromiseInterface
    {
        return $this->createPromise();
    }

    public function create(array $options): PromiseInterface
    {
        return $this->createPromise();
    }
}
