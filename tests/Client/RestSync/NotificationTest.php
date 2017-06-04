<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\NotificationAsyncDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Notification
 */
class NotificationTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new NotificationAsyncSpy();
        $target = new Notification($client);
        $this->assertNotNull($target->list());
        $this->assertTrue($client->listCalled);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class NotificationAsyncSpy extends NotificationAsyncDummy
{
    public $listCalled;

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return parent::list();
    }
}
