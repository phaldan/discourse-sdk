<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\SiteSettings
 */
class SiteSettingsTest extends TestCase
{
    /**
     * @test
     */
    public function successUpdate(): void
    {
        $client = new HttpPutSpy();
        $target = new SiteSettings($client);
        $attribute = ['title' => 'My fancy board'];
        $this->assertNull($target->update('title', $attribute)->wait());
        $this->assertSame(sprintf(RouteConstants::SITE_SETTINGS_SET, 'title'), $client->path);
        $this->assertSame($attribute, $client->json);
    }
}
