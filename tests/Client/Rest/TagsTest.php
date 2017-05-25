<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Tags
 */
class TagsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Tags($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(RouteConstants::TAG_LIST, $client->path);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $client = new HttpGetSpy();
        $target = new Tags($client);
        $this->assertNull($target->single('faq')->wait());
        $this->assertSame(sprintf(RouteConstants::TAG_SINGLE, 'faq'), $client->path);
    }
}
