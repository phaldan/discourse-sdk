<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\SiteSetting
 */
class SiteSettingTest extends TestCase
{
    /**
     * @test
     */
    public function successUpdate(): void
    {
        $client = new class() implements SiteSettingAsync {
            public $updateSetting;
            public $updateAttributes;

            public function update(string $setting, array $attributes): PromiseInterface
            {
                $this->updateSetting = $setting;
                $this->updateAttributes = $attributes;
                $promise = new Promise();
                $promise->resolve(new ResponseDummy());

                return $promise;
            }
        };
        $target = new SiteSetting($client);
        $attributes = ['setting' => 'value'];
        $this->assertNotNull($target->update('setting', $attributes));
        $this->assertSame('setting', $client->updateSetting);
        $this->assertSame($attributes, $client->updateAttributes);
    }
}
