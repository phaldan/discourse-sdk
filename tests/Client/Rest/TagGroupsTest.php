<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\TagGroups
 */
class TagGroupsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new TagGroups($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(RouteConstants::TAG_GROUPS_LIST, $client->path);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $client = new HttpGetSpy();
        $target = new TagGroups($client);
        $this->assertNull($target->single(1337)->wait());
        $this->assertSame(sprintf(RouteConstants::TAG_GROUPS_SINGLE, 1337), $client->path);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $client = new HttpPostSpy();
        $target = new TagGroups($client);
        $attributes = [TagGroups::ATTR_NAME => 'group'];
        $this->assertNull($target->create($attributes)->wait());
        $this->assertSame(RouteConstants::TAG_GROUP_CREATE, $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successUodate(): void
    {
        $client = new HttpPutSpy();
        $target = new TagGroups($client);
        $attributes = [TagGroups::ATTR_NAME => 'group'];
        $this->assertNull($target->update(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::TAG_GROUPS_UPDATE, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }
}
