<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\TagGroups
 */
class TagGroupsTest extends HttpTestCase
{
    /**
     * @var TagGroups
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new TagGroups(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::TAG_GROUP_LIST);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNull($this->target->single(1337)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::TAG_GROUP_SINGLE, 1337));
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [TagGroups::ATTR_NAME => 'group'];
        $this->assertNull($this->target->create($attributes)->wait());
        $this->assertHttpPost(RouteConstants::TAG_GROUP_CREATE, $attributes);
    }

    /**
     * @test
     */
    public function successUodate(): void
    {
        $attributes = [TagGroups::ATTR_NAME => 'group'];
        $this->assertNull($this->target->update(1337, $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::TAG_GROUP_UPDATE, 1337), $attributes);
    }
}
