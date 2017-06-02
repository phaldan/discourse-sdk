<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\GroupAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Group
 */
class GroupTest extends TestCase
{
    /**
     * @var Group
     */
    private $target;

    /**
     * @var GroupAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new GroupAsyncSpy();
        $this->target = new Group($this->client);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [GroupAsyncSpy::ATTRIBUTE_GROUP_NAME => 'name'];
        $this->assertNotNull($this->target->create($attributes));
        $this->assertSame($attributes, $this->client->createAttributes);
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
    public function successList(): void
    {
        $parameters = [GroupAsyncSpy::OPTION_OFFSET => 1337];
        $this->assertNotNull($this->target->list($parameters));
        $this->assertSame($parameters, $this->client->listParameters);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNotNull($this->target->single('group'));
        $this->assertSame('group', $this->client->singleName);
    }

    /**
     * @test
     */
    public function successAddMember(): void
    {
        $attributes = [GroupAsyncSpy::ATTRIBUTE_USERNAMES => 'user1,user2'];
        $this->assertNotNull($this->target->addMember(42, $attributes));
        $this->assertSame(42, $this->client->addMemberId);
        $this->assertSame($attributes, $this->client->addMemberAttributes);
    }

    /**
     * @test
     */
    public function successDeleteMember(): void
    {
        $attributes = [GroupAsyncSpy::ATTRIBUTE_USER_ID => 1337];
        $this->assertNotNull($this->target->deleteMember(42, $attributes));
        $this->assertSame(42, $this->client->deleteMemberId);
        $this->assertSame($attributes, $this->client->deleteMemberAttributes);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class GroupAsyncSpy implements GroupAsync
{
    public $createAttributes;
    public $deleteId;
    public $listParameters;
    public $singleName;
    public $addMemberId;
    public $addMemberAttributes;
    public $deleteMemberId;
    public $deleteMemberAttributes;

    public function create(array $attributes): PromiseInterface
    {
        $this->createAttributes = $attributes;

        return $this->createPromise();
    }

    public function delete(int $id): PromiseInterface
    {
        $this->deleteId = $id;

        return $this->createPromise();
    }

    public function list(array $parameters = []): PromiseInterface
    {
        $this->listParameters = $parameters;

        return $this->createPromise();
    }

    public function single(string $name): PromiseInterface
    {
        $this->singleName = $name;

        return $this->createPromise();
    }

    public function addMember(int $id, array $attributes): PromiseInterface
    {
        $this->addMemberId = $id;
        $this->addMemberAttributes = $attributes;

        return $this->createPromise();
    }

    public function deleteMember(int $id, array $attributes): PromiseInterface
    {
        $this->deleteMemberId = $id;
        $this->deleteMemberAttributes = $attributes;

        return $this->createPromise();
    }

    private function createPromise(): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
