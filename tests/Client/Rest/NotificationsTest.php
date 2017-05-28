<?php

namespace PhALDan\Discourse\Client\Rest;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Notifications
 */
class NotificationsTest extends HttpTestCase
{
    /**
     * @var Notifications
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Notifications(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::NOTIFICATION_LIST);
    }
}
