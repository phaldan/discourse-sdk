<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @coversNothing
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
        $this->assertSame(RouteConstants::TAGS_LIST, $client->path);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $client = new HttpGetSpy();
        $target = new Tags($client);
        $this->assertNull($target->single('faq')->wait());
        $this->assertSame(sprintf(RouteConstants::TAGS_SINGLE, 'faq'), $client->path);
    }
}
