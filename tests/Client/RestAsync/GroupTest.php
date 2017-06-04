<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Group
 */
class GroupTest extends HttpTestCase
{
    /**
     * @var Group
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Group(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::GROUP_LIST);
    }

    /**
     * @test
     */
    public function successWithOffset(): void
    {
        $parameters = [Group::OPTION_OFFSET => 1337];
        $this->assertNull($this->target->list($parameters)->wait());
        $this->assertHttpGet(RouteConstants::GROUP_LIST.'?'.Group::OPTION_OFFSET.'=1337');
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $group = [Group::ATTRIBUTE_GROUP_NAME => 'admins'];
        $this->assertNull($this->target->create($group)->wait());
        $this->assertHttpPost(RouteConstants::GROUP_CREATE, $group);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $this->assertNull($this->target->delete(1337)->wait());
        $this->assertHttpDelete(sprintf(RouteConstants::GROUP_DELETE, 1337));
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNull($this->target->single('admins')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::GROUP_SINGLE, 'admins'));
    }

    /**
     * @test
     */
    public function successAddMember(): void
    {
        $attributes = [Group::ATTRIBUTE_USERNAMES => 'user1,user2'];
        $this->assertNull($this->target->addMember(1337, $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::GROUP_ADD_MEMBER, 1337), $attributes);
    }

    /**
     * @test
     */
    public function successDeleteMember(): void
    {
        $attributes = [Group::ATTRIBUTE_USER_ID => 42];
        $this->assertNull($this->target->deleteMember(1337, $attributes)->wait());
        $this->assertHttpDelete(sprintf(RouteConstants::GROUP_DELETE_MEMBER, 1337), $attributes);
    }
}
