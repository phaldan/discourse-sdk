<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Groups
 */
class GroupsTest extends TestCase
{
    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Groups($client);
        $this->assertNull($target->list()->wait());
        $this->assertSame(RouteConstants::GROUP_LIST, $client->path);
    }

    /**
     * @test
     */
    public function successWithOffset(): void
    {
        $client = new HttpGetSpy();
        $target = new Groups($client);
        $parameters = [Groups::OPTION_OFFSET => 1337];
        $this->assertNull($target->list($parameters)->wait());
        $this->assertSame(RouteConstants::GROUP_LIST, $client->path);
        $this->assertSame($parameters, $client->parameters);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $client = new HttpPostSpy();
        $target = new Groups($client);
        $group = [Groups::ATTRIBUTE_GROUP_NAME => 'admins'];
        $this->assertNull($target->create($group)->wait());
        $this->assertSame(RouteConstants::GROUP_CREATE, $client->path);
        $this->assertSame($group, $client->json);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $client = new HttpDeleteSpy();
        $target = new Groups($client);
        $this->assertNull($target->delete(1337)->wait());
        $this->assertSame(sprintf(RouteConstants::GROUP_DELETE, 1337), $client->path);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $client = new HttpGetSpy();
        $target = new Groups($client);
        $this->assertNull($target->single('admins')->wait());
        $this->assertSame(sprintf(RouteConstants::GROUP_SINGLE, 'admins'), $client->path);
    }

    /**
     * @test
     */
    public function successAddMember(): void
    {
        $client = new HttpPutSpy();
        $target = new Groups($client);
        $this->assertNull($target->addMember(1337, ['username'])->wait());
        $this->assertSame(sprintf(RouteConstants::GROUP_ADD_MEMBER, 1337), $client->path);
        $this->assertSame([Groups::ATTRIBUTE_MEMBER_USERNAMES => 'username'], $client->json);
    }

    /**
     * @test
     */
    public function successAddMemberWithMultipleUsernames(): void
    {
        $client = new HttpPutSpy();
        $target = new Groups($client);
        $this->assertNull($target->addMember(1337, ['user1', 'user2'])->wait());
        $this->assertSame(sprintf(RouteConstants::GROUP_ADD_MEMBER, 1337), $client->path);
        $this->assertSame([Groups::ATTRIBUTE_MEMBER_USERNAMES => 'user1,user2'], $client->json);
    }

    /**
     * @test
     */
    public function successDeleteMember(): void
    {
        $client = new HttpDeleteSpy();
        $target = new Groups($client);
        $attributes = [Groups::ATTRIBUTE_USER_ID => 42];
        $this->assertNull($target->deleteMember(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::GROUP_DELETE_MEMBER, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }
}
