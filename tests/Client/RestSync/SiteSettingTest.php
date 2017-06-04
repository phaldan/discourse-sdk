<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\SiteSettingAsyncDummy;
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
        $client = new class() extends SiteSettingAsyncDummy {
            public $updateSetting;
            public $updateAttributes;

            public function update(string $setting, array $attributes): PromiseInterface
            {
                $this->updateSetting = $setting;
                $this->updateAttributes = $attributes;

                return parent::update($setting, $attributes);
            }
        };
        $target = new SiteSetting($client);
        $attributes = ['setting' => 'value'];
        $this->assertNotNull($target->update('setting', $attributes));
        $this->assertSame('setting', $client->updateSetting);
        $this->assertSame($attributes, $client->updateAttributes);
    }
}
