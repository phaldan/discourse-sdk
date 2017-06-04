<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\TagAsyncDummy;
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
class TagAsyncSpy extends TagAsyncDummy
{
    public $listCalled;
    public $singleName;

    public function list(): PromiseInterface
    {
        $this->listCalled = true;

        return parent::list();
    }

    public function single(string $name): PromiseInterface
    {
        $this->singleName = $name;

        return parent::single($name);
    }
}
