<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Flags
 */
class FlagsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Flags($client);
        $this->assertNull($target->list(Flags::TYPE_ACTIVE)->wait());
        $this->assertSame(sprintf(RouteConstants::FLAGS_LIST, Flags::TYPE_ACTIVE), $client->path);
    }

    /**
     * @test
     */
    public function successListWithOffset()
    {
        $client = new HttpGetSpy();
        $target = new Flags($client);
        $this->assertNull($target->list(Flags::TYPE_ACTIVE, [Flags::OPTION_OFFSET => 1337])->wait());
        $url = sprintf(RouteConstants::FLAGS_LIST, Flags::TYPE_ACTIVE).'?'.Flags::OPTION_OFFSET.'=1337';
        $this->assertSame($url, $client->path);
    }
}
