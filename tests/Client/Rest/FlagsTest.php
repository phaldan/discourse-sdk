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
        $this->assertSame(sprintf(RouteConstants::FLAG_LIST, Flags::TYPE_ACTIVE), $client->path);
        $this->assertSame([], $client->parameters);
    }

    /**
     * @test
     */
    public function successListWithOffset()
    {
        $client = new HttpGetSpy();
        $target = new Flags($client);
        $parameters = [Flags::OPTION_OFFSET => 1337];
        $this->assertNull($target->list(Flags::TYPE_ACTIVE, $parameters)->wait());
        $this->assertSame(sprintf(RouteConstants::FLAG_LIST, Flags::TYPE_ACTIVE), $client->path);
        $this->assertSame($parameters, $client->parameters);
    }
}
