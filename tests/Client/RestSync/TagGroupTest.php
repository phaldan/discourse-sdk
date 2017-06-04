<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\TagGroupAsyncDummy;
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
class TagGroupAsyncSpy extends TagGroupAsyncDummy
{
    public $createAttributes;
    public $listCalled;
    public $singleId;
    public $updateId;
    public $updateAttributes;

    public function create(array $attributes): PromiseInterface
    {
        $this->createAttributes = $attributes;

        return parent::create($attributes);
    }

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return parent::list();
    }

    public function single(int $id): PromiseInterface
    {
        $this->singleId = $id;

        return parent::single($id);
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        $this->updateId = $id;
        $this->updateAttributes = $attributes;

        return parent::update($id, $attributes);
    }
}
