<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\PrivateMessages
 */
class PrivateMessagesTest extends TestCase
{
    /**
     * @var PrivateMessages
     */
    private $target;

    /**
     * @var HttpGetSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new HttpGetSpy();
        $this->target = new PrivateMessages($this->client);
    }

    /**
     * @test
     */
    public function successInbox(): void
    {
        $this->assertNull($this->target->inbox('admin')->wait());
        $this->assertSame(sprintf(RouteConstants::PRIVATE_MESSAGE_INBOX, 'admin'), $this->client->path);
    }

    /**
     * @test
     */
    public function successSent(): void
    {
        $this->assertNull($this->target->sent('admin')->wait());
        $this->assertSame(sprintf(RouteConstants::PRIVATE_MESSAGE_SENT, 'admin'), $this->client->path);
    }

    /**
     * @test
     */
    public function successArchive(): void
    {
        $this->assertNull($this->target->archive('admin')->wait());
        $this->assertSame(sprintf(RouteConstants::PRIVATE_MESSAGE_ARCHIVE, 'admin'), $this->client->path);
    }

    /**
     * @test
     */
    public function successGroup(): void
    {
        $this->assertNull($this->target->group('admin', 'group')->wait());
        $this->assertSame(sprintf(RouteConstants::PRIVATE_MESSAGE_GROUP, 'admin', 'group'), $this->client->path);
    }

    /**
     * @test
     */
    public function successGroupArchive(): void
    {
        $this->assertNull($this->target->groupArchive('admin', 'group')->wait());
        $this->assertSame(sprintf(RouteConstants::PRIVATE_MESSAGE_GROUP_ARCHIVE, 'admin', 'group'), $this->client->path);
    }
}
