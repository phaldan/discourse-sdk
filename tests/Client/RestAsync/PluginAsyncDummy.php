<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PluginAsyncDummy extends PromiseFactoryStub implements PluginAsync
{
    public function list(): PromiseInterface
    {
        return $this->createPromise();
    }
}
