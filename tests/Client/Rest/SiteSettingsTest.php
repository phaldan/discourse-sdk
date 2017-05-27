<?php

namespace PhALDan\Discourse\Client\Rest;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\SiteSettings
 */
class SiteSettingsTest extends HttpTestCase
{
    /**
     * @var SiteSettings
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new SiteSettings($this->http);
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $attribute = ['title' => 'My fancy board'];
        $this->assertNull($this->target->update('title', $attribute)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::SITE_SETTING_SET, 'title'), $attribute);
    }
}
