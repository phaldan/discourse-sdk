<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Notification
 */
class NotificationTest extends HttpTestCase
{
    /**
     * @var Notification
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Notification(self::URL, $this->http);
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
