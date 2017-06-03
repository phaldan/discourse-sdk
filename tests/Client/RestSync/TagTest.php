<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\TagAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Tag
 */
class TagTest extends TestCase
{
    /**
     * @var Tag
     */
    private $target;

    /**
     * @var TagAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TagAsyncSpy();
        $this->target = new Tag($this->client);
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
        $this->assertNotNull($this->target->single('name'));
        $this->assertSame('name', $this->client->singleName);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class TagAsyncSpy implements TagAsync
{
    public $listCalled;
    public $singleName;

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return $this->createPromise();
    }

    public function single(string $name): PromiseInterface
    {
        $this->singleName = $name;

        return $this->createPromise();
    }

    private function createPromise(): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
