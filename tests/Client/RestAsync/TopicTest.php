<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Topic
 */
class TopicTest extends HttpTestCase
{
    /**
     * @var Topic
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Topic(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successCreateScheduled(): void
    {
        $attributes = [Topic::ATTR_TIME => 'some-time'];
        $this->assertNull($this->target->createScheduled(1337, $attributes)->wait());
        $this->assertHttpPost(sprintf(RouteConstants::TOPIC_CREATE_SCHEDULED, 1337), $attributes);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $this->assertNull($this->target->delete(1337)->wait());
        $this->assertHttpDelete(sprintf(RouteConstants::TOPIC_DELETE, 1337));
    }

    /**
     * @test
     */
    public function successInvite(): void
    {
        $attributes = [Topic::ATTR_USERNAME => 'username'];
        $this->assertNull($this->target->invite(1337, $attributes)->wait());
        $this->assertHttpPost(sprintf(RouteConstants::TOPIC_INVITE, 1337), $attributes);
    }

    /**
     * @test
     */
    public function successLatest(): void
    {
        $this->assertNull($this->target->latest()->wait());
        $this->assertHttpGet(RouteConstants::TOPIC_LATEST);
    }

    /**
     * @test
     */
    public function successLatestWithParameter(): void
    {
        $parameters = [Topic::OPTION_ORDER => Topic::ORDER_DEFAULT];
        $this->assertNull($this->target->latest($parameters)->wait());
        $this->assertHttpGet(RouteConstants::TOPIC_LATEST.'?'.Topic::OPTION_ORDER.'='.Topic::ORDER_DEFAULT);
    }

    /**
     * @test
     */
    public function successNotification(): void
    {
        $attributes = [Topic::ATTR_NOTIFICATION_LEVEL => 1];
        $this->assertNull($this->target->notification(1337, $attributes)->wait());
        $this->assertHttpPost(sprintf(RouteConstants::TOPIC_NOTIFICATIONS, 1337), $attributes);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNull($this->target->single(1337)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::TOPIC_SINGLE, 1337));
    }

    /**
     * @test
     */
    public function successTop(): void
    {
        $this->assertNull($this->target->top()->wait());
        $this->assertHttpGet(RouteConstants::TOPIC_TOP);
    }

    /**
     * @test
     */
    public function successTopFiltered(): void
    {
        $this->assertNull($this->target->topFiltered(Topic::FLAG_ALL)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::TOPIC_TOP_FILTERED, Topic::FLAG_ALL));
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $attribute = [Topic::ATTR_TITLE => 'newer news'];
        $this->assertNull($this->target->update('news', 1337, $attribute)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::TOPIC_UPDATE, 'news', 1337), $attribute);
    }

    /**
     * @test
     */
    public function updateScheduled(): void
    {
        $attributes = [Topic::ATTR_TIMESTAMP => 42];
        $this->assertNull($this->target->updateScheduled(1337, $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::TOPIC_UPDATE_SCHEDULED, 1337), $attributes);
    }

    /**
     * @test
     */
    public function updateStatus(): void
    {
        $attributes = [Topic::ATTR_STATUS => Topic::STATUS_VISIBLE];
        $this->assertNull($this->target->updateStatus(1337, $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::TOPIC_UPDATE_STATUS, 1337), $attributes);
    }
}
