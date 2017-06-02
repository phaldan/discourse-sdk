<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Badges
 */
class BadgesTest extends HttpTestCase
{
    /**
     * @var Badges
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Badges(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::BADGE_LIST);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $this->assertNull($this->target->create([])->wait());
        $this->assertHttpPost(RouteConstants::BADGE_CREATE, []);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $this->assertNull($this->target->delete(1337)->wait());
        $this->assertHttpDelete(sprintf(RouteConstants::BADGE_DELETE, 1337));
    }
}
