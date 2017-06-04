<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Plugin
 */
class PluginTest extends HttpTestCase
{
    /**
     * @var Plugin
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Plugin(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::PLUGIN_LIST);
    }
}
