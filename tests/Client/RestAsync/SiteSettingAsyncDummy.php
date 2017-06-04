<?php

namespace PhALDan\Discourse\Client\RestAsync;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class SiteSettingAsyncDummy extends PromiseFactoryStub implements SiteSettingAsync
{
    public function update(string $setting, array $attributes): PromiseInterface
    {
        return $this->createPromise();
    }
}
