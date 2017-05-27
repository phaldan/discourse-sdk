<?php

namespace PhALDan\Discourse\Client\Rest;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Groups
 */
class GroupsTest extends HttpTestCase
{
    /**
     * @var Groups
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Groups($this->http);
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
        $parameters = [Groups::OPTION_OFFSET => 1337];
        $this->assertNull($this->target->list($parameters)->wait());
        $this->assertHttpGet(RouteConstants::GROUP_LIST.'?'.Groups::OPTION_OFFSET.'=1337');
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $group = [Groups::ATTRIBUTE_GROUP_NAME => 'admins'];
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
        $attributes = [Groups::ATTRIBUTE_USERNAMES => 'user1,user2'];
        $this->assertNull($this->target->addMember(1337, $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::GROUP_ADD_MEMBER, 1337), $attributes);
    }

    /**
     * @test
     */
    public function successDeleteMember(): void
    {
        $attributes = [Groups::ATTRIBUTE_USER_ID => 42];
        $this->assertNull($this->target->deleteMember(1337, $attributes)->wait());
        $this->assertHttpDelete(sprintf(RouteConstants::GROUP_DELETE_MEMBER, 1337), $attributes);
    }
}
