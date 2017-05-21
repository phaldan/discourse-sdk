<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Plugins
 */
class PluginsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Plugins($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(RouteConstants::PLUGINS_LIST, $client->path);
    }
}
