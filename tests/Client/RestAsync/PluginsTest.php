<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Plugins
 */
class PluginsTest extends HttpTestCase
{
    /**
     * @var Plugins
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Plugins(self::URL, $this->http);
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
