<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\BadgeAsyncDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Badge
 */
class BadgeTest extends TestCase
{
    /**
     * @var Badge
     */
    private $target;

    /**
     * @var BadgeAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new BadgeAsyncSpy();
        $this->target = new Badge($this->client);
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
    public function successCreate(): void
    {
        $this->assertNotNull($this->target->create([]));
        $this->assertSame([], $this->client->createAttributes);
    }

    /**
     * @test
     */
    public function successDelete(): void
    {
        $this->assertNotNull($this->target->delete(1337));
        $this->assertSame(1337, $this->client->deleteId);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class BadgeAsyncSpy extends BadgeAsyncDummy
{
    public $listCalled;
    public $createAttributes;
    public $deleteId;

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return parent::list();
    }

    public function create(array $attributes): PromiseInterface
    {
        $this->createAttributes = $attributes;

        return parent::create($attributes);
    }

    public function delete(int $id): PromiseInterface
    {
        $this->deleteId = $id;

        return parent::delete($id);
    }
}
