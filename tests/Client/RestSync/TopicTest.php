<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\TopicAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Topic
 */
class TopicTest extends TestCase
{
    /**
     * @var Topic
     */
    private $target;

    /**
     * @var TopicAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TopicAsyncSpy();
        $this->target = new Topic($this->client);
    }

    /**
     * @test
     */
    public function successCreateScheduled(): void
    {
        $attributes = [TopicAsyncSpy::ATTR_TIME => '20170604125810+0200'];
        $this->assertNotNull($this->target->createScheduled(42, $attributes));
        $this->assertSame(42, $this->client->createScheduledId);
        $this->assertSame($attributes, $this->client->createScheduledAttributes);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $this->assertNotNull($this->target->delete(42));
        $this->assertSame(42, $this->client->deleteId);
    }

    /**
     * @test
     */
    public function successInvite(): void
    {
        $attributes = [TopicAsyncSpy::ATTR_USERNAME => 'username'];
        $this->assertNotNull($this->target->invite(42, $attributes));
        $this->assertSame(42, $this->client->inviteId);
        $this->assertSame($attributes, $this->client->inviteAttributes);
    }

    /**
     * @test
     */
    public function successLatest(): void
    {
        $parameters = [TopicAsyncSpy::OPTION_ORDER => TopicAsyncSpy::ORDER_DEFAULT];
        $this->assertNotNull($this->target->latest($parameters));
        $this->assertSame($parameters, $this->client->latestParameters);
    }

    /**
     * @test
     */
    public function successNotification(): void
    {
        $attributes = [TopicAsyncSpy::ATTR_NOTIFICATION_LEVEL => 1];
        $this->assertNotNull($this->target->notification(42, $attributes));
        $this->assertSame(42, $this->client->notificationId);
        $this->assertSame($attributes, $this->client->notificationAttributes);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNotNull($this->target->single(1337));
        $this->assertSame(1337, $this->client->singleId);
    }

    /**
     * @test
     */
    public function successTop(): void
    {
        $this->assertNotNull($this->target->top());
        $this->assertTrue($this->client->topCalled);
    }

    /**
     * @test
     */
    public function successTopFiltered(): void
    {
        $this->assertNotNull($this->target->topFiltered(TopicAsyncSpy::FLAG_ALL));
        $this->assertSame(TopicAsyncSpy::FLAG_ALL, $this->client->topFilteredFlag);
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $attributes = [TopicAsyncSpy::ATTR_TITLE => 'new-title'];
        $this->assertNotNull($this->target->update('title', 42, $attributes));
        $this->assertSame('title', $this->client->updateSlug);
        $this->assertSame(42, $this->client->updateId);
        $this->assertSame($attributes, $this->client->updateAttributes);
    }

    /**
     * @test
     */
    public function successUpdateScheduled(): void
    {
        $attributes = [TopicAsyncSpy::ATTR_TIMESTAMP => 42];
        $this->assertNotNull($this->target->updateScheduled(1337, $attributes));
        $this->assertSame(1337, $this->client->updateScheduledId);
        $this->assertSame($attributes, $this->client->updateScheduledAttributes);
    }

    /**
     * @test
     */
    public function successUpdateStatus(): void
    {
        $attributes = [TopicAsyncSpy::ATTR_STATUS => TopicAsyncSpy::STATUS_ARCHIVED];
        $this->assertNotNull($this->target->updateStatus(42, $attributes));
        $this->assertSame(42, $this->client->updateStatusId);
        $this->assertSame($attributes, $this->client->updateStatusAttributes);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TopicAsyncSpy implements TopicAsync
{
    public $createScheduledId;
    public $createScheduledAttributes;
    public $deleteId;
    public $inviteId;
    public $inviteAttributes;
    public $latestParameters;
    public $notificationId;
    public $notificationAttributes;
    public $singleId;
    public $topCalled;
    public $topFilteredFlag;
    public $updateSlug;
    public $updateId;
    public $updateAttributes;
    public $updateScheduledId;
    public $updateScheduledAttributes;
    public $updateStatusId;
    public $updateStatusAttributes;

    public function createScheduled(int $id, array $attributes): PromiseInterface
    {
        $this->createScheduledId = $id;
        $this->createScheduledAttributes = $attributes;

        return $this->createPromise();
    }

    public function delete(int $id): PromiseInterface
    {
        $this->deleteId = $id;

        return $this->createPromise();
    }

    public function invite(int $id, array $attributes): PromiseInterface
    {
        $this->inviteId = $id;
        $this->inviteAttributes = $attributes;

        return $this->createPromise();
    }

    public function latest(array $parameters = []): PromiseInterface
    {
        $this->latestParameters = $parameters;

        return $this->createPromise();
    }

    public function notification(int $id, array $attributes): PromiseInterface
    {
        $this->notificationId = $id;
        $this->notificationAttributes = $attributes;

        return $this->createPromise();
    }

    public function single(int $id): PromiseInterface
    {
        $this->singleId = $id;

        return $this->createPromise();
    }

    public function top(): PromiseInterface
    {
        $this->topCalled = true;

        return $this->createPromise();
    }

    public function topFiltered(string $flag): PromiseInterface
    {
        $this->topFilteredFlag = $flag;

        return $this->createPromise();
    }

    public function update(string $slug, int $id, array $attributes): PromiseInterface
    {
        $this->updateSlug = $slug;
        $this->updateId = $id;
        $this->updateAttributes = $attributes;

        return $this->createPromise();
    }

    public function updateScheduled(int $id, array $attributes): PromiseInterface
    {
        $this->updateScheduledId = $id;
        $this->updateScheduledAttributes = $attributes;

        return $this->createPromise();
    }

    public function updateStatus(int $id, array $attributes): PromiseInterface
    {
        $this->updateStatusId = $id;
        $this->updateStatusAttributes = $attributes;

        return $this->createPromise();
    }

    private function createPromise(): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
