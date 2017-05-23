<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @coversNothing
 */
class TopicsTest extends TestCase
{
    /**
     * @test
     */
    public function successCreateScheduled(): void
    {
        $client = new HttpPostSpy();
        $target = new Topics($client);
        $attributes = [Topics::ATTR_TIME => 'some-time'];
        $this->assertNull($target->createScheduled(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_CREATE_SCHEDULED, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $client = new HttpDeleteSpy();
        $target = new Topics($client);
        $this->assertNull($target->delete(1337)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_DELETE, 1337), $client->path);
    }

    /**
     * @test
     */
    public function successInvite(): void
    {
        $client = new HttpPostSpy();
        $target = new Topics($client);
        $attributes = [Topics::ATTR_USERNAME => 'username'];
        $this->assertNull($target->invite(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_INVITE, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successLatest(): void
    {
        $client = new HttpGetSpy();
        $target = new Topics($client);
        $this->assertNull($target->latest()->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_LATEST), $client->path);
        $this->assertSame([], $client->parameters);
    }

    /**
     * @test
     */
    public function successLatestWithParameter(): void
    {
        $client = new HttpGetSpy();
        $target = new Topics($client);
        $parameters = [Topics::OPTION_ORDER => Topics::ORDER_DEFAULT];
        $this->assertNull($target->latest($parameters)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_LATEST), $client->path);
        $this->assertSame($parameters, $client->parameters);
    }

    /**
     * @test
     */
    public function successNotification(): void
    {
        $client = new HttpPostSpy();
        $target = new Topics($client);
        $attributes = [Topics::ATTR_NOTIFICATION_LEVEL => 1];
        $this->assertNull($target->notification(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_NOTIFICATIONS, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $client = new HttpGetSpy();
        $target = new Topics($client);
        $this->assertNull($target->single(1337)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_SINGLE, 1337), $client->path);
    }

    /**
     * @test
     */
    public function successTop(): void
    {
        $client = new HttpGetSpy();
        $target = new Topics($client);
        $this->assertNull($target->top()->wait());
        $this->assertSame(RouteConstants::TOPICS_TOP, $client->path);
    }

    /**
     * @test
     */
    public function successTopFiltered(): void
    {
        $client = new HttpGetSpy();
        $target = new Topics($client);
        $this->assertNull($target->topFiltered(Topics::FLAG_ALL)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_TOP_FILTERED, Topics::FLAG_ALL), $client->path);
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $client = new HttpPutSpy();
        $target = new Topics($client);
        $attribute = [Topics::ATTR_TITLE => 'newer news'];
        $this->assertNull($target->update('news', 1337, $attribute)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_UPDATE, 'news', 1337), $client->path);
        $this->assertSame($attribute, $client->json);
    }

    /**
     * @test
     */
    public function updateScheduled(): void
    {
        $client = new HttpPutSpy();
        $target = new Topics($client);
        $attributes = [Topics::ATTR_TIMESTAMP => 42];
        $this->assertNull($target->updateScheduled(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_UPDATE_SCHEDULED, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function updateStatus(): void
    {
        $client = new HttpPutSpy();
        $target = new Topics($client);
        $attributes = [Topics::ATTR_STATUS => Topics::STATUS_VISIBLE];
        $this->assertNull($target->updateStatus(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::TOPICS_UPDATE_STATUS, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }
}
