<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\PrivateMessageAsyncDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\PrivateMessage
 */
class PrivateMessageTest extends TestCase
{
    /**
     * @var PrivateMessage
     */
    private $target;

    /**
     * @var PrivateMessageAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new PrivateMessageAsyncSpy();
        $this->target = new PrivateMessage($this->client);
    }

    /**
     * @test
     */
    public function successInbox(): void
    {
        $this->assertNotNull($this->target->inbox('username'));
        $this->assertSame('username', $this->client->inboxUsername);
    }

    /**
     * @test
     */
    public function successSent(): void
    {
        $this->assertNotNull($this->target->sent('username'));
        $this->assertSame('username', $this->client->sentUsername);
    }

    /**
     * @test
     */
    public function successArchive(): void
    {
        $this->assertNotNull($this->target->archive('username'));
        $this->assertSame('username', $this->client->archiveUsername);
    }

    /**
     * @test
     */
    public function successGroup(): void
    {
        $this->assertNotNull($this->target->group('username', 'group'));
        $this->assertSame('username', $this->client->groupUsername);
        $this->assertSame('group', $this->client->groupGroup);
    }

    /**
     * @test
     */
    public function successGroupArchive(): void
    {
        $this->assertNotNull($this->target->groupArchive('username', 'group'));
        $this->assertSame('username', $this->client->groupArchiveUsername);
        $this->assertSame('group', $this->client->groupArchiveGroup);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PrivateMessageAsyncSpy extends PrivateMessageAsyncDummy
{
    public $inboxUsername;
    public $sentUsername;
    public $archiveUsername;
    public $groupUsername;
    public $groupGroup;
    public $groupArchiveUsername;
    public $groupArchiveGroup;

    public function inbox(string $username): PromiseInterface
    {
        $this->inboxUsername = $username;

        return parent::inbox($username);
    }

    public function sent(string $username): PromiseInterface
    {
        $this->sentUsername = $username;

        return parent::sent($username);
    }

    public function archive(string $username): PromiseInterface
    {
        $this->archiveUsername = $username;

        return parent::archive($username);
    }

    public function group(string $username, string $group): PromiseInterface
    {
        $this->groupUsername = $username;
        $this->groupGroup = $group;

        return parent::group($username, $group);
    }

    public function groupArchive(string $username, string $group): PromiseInterface
    {
        $this->groupArchiveUsername = $username;
        $this->groupArchiveGroup = $group;

        return parent::groupArchive($username, $group);
    }
}
