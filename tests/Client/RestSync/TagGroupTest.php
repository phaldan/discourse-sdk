<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\TagGroup
 */
class TagGroupTest extends TestCase
{
    /**
     * @var TagGroup
     */
    private $target;

    /**
     * @var TagGroupAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TagGroupAsyncSpy();
        $this->target = new TagGroup($this->client);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [TagGroupAsyncSpy::ATTR_NAME => 'name'];
        $this->assertNotNull($this->target->create($attributes));
        $this->assertSame($attributes, $this->client->createAttributes);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNotNull($this->target->list());
        $this->assertTrue($this->client->listCalled);
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
    public function successUpdate(): void
    {
        $attributes = [TagGroupAsyncSpy::ATTR_NAME => 'name'];
        $this->assertNotNull($this->target->update(42, $attributes));
        $this->assertSame(42, $this->client->updateId);
        $this->assertSame($attributes, $this->client->updateAttributes);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TagGroupAsyncSpy implements TagGroupAsync
{
    public $createAttributes;
    public $listCalled;
    public $singleId;
    public $updateId;
    public $updateAttributes;

    public function create(array $attributes): PromiseInterface
    {
        $this->createAttributes = $attributes;

        return $this->createPromise();
    }

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return $this->createPromise();
    }

    public function single(int $id): PromiseInterface
    {
        $this->singleId = $id;

        return $this->createPromise();
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        $this->updateId = $id;
        $this->updateAttributes = $attributes;

        return $this->createPromise();
    }

    private function createPromise(): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
