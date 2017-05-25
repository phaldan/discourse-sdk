<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Notifications
 */
class NotificationsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Notifications($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(RouteConstants::NOTIFICATION_LIST, $client->path);
    }
}
