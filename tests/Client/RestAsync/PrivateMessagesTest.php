<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\PrivateMessages
 */
class PrivateMessagesTest extends HttpTestCase
{
    /**
     * @var PrivateMessages
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new PrivateMessages(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successInbox(): void
    {
        $this->assertNull($this->target->inbox('admin')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::PRIVATE_MESSAGE_INBOX, 'admin'));
    }

    /**
     * @test
     */
    public function successSent(): void
    {
        $this->assertNull($this->target->sent('admin')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::PRIVATE_MESSAGE_SENT, 'admin'));
    }

    /**
     * @test
     */
    public function successArchive(): void
    {
        $this->assertNull($this->target->archive('admin')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::PRIVATE_MESSAGE_ARCHIVE, 'admin'));
    }

    /**
     * @test
     */
    public function successGroup(): void
    {
        $this->assertNull($this->target->group('admin', 'group')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::PRIVATE_MESSAGE_GROUP, 'admin', 'group'));
    }

    /**
     * @test
     */
    public function successGroupArchive(): void
    {
        $this->assertNull($this->target->groupArchive('admin', 'group')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::PRIVATE_MESSAGE_GROUP_ARCHIVE, 'admin', 'group'));
    }
}
