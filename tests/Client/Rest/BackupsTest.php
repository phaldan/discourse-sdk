<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Backups
 */
class BackupsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Backups($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(RouteConstants::BACKUPS_LIST, $client->path);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $client = new HttpPostSpy();
        $target = new Backups($client);
        $this->assertNull($target->create([Backups::ATTR_WITH_UPLOADS => true])->wait());
        $this->assertSame(RouteConstants::BACKUPS_CREATE, $client->path);
        $this->assertSame([Backups::ATTR_WITH_UPLOADS => true], $client->json);
    }
}
