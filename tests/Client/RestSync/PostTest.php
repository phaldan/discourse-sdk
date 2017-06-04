<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\PostAsyncDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Post
 */
class PostTest extends TestCase
{
    /**
     * @var Post
     */
    private $target;

    /**
     * @var PostAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new PostAsyncSpy();
        $this->target = new Post($this->client);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [PostAsyncSpy::ATTR_TITLE => 'title'];
        $this->assertNotNull($this->target->create($attributes));
        $this->assertSame($attributes, $this->client->createAttributes);
    }

    /**
     * @test
     */
    public function successLike(): void
    {
        $attributes = [PostAsyncSpy::ATTR_ID => 1337];
        $this->assertNotNull($this->target->like($attributes));
        $this->assertSame($attributes, $this->client->likeAttributes);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNotNull($this->target->single(42));
        $this->assertSame(42, $this->client->singleId);
    }

    /**
     * @test
     */
    public function successUnlike(): void
    {
        $attributes = [PostAsyncSpy::ATTR_POST_ACTION_TYPE => 1337];
        $this->assertNotNull($this->target->unlike(42, $attributes));
        $this->assertSame(42, $this->client->unlikeId);
        $this->assertSame($attributes, $this->client->unlikeAttributes);
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $attributes = [PostAsyncSpy::ATTR_POST_RAW => 'Lorem Ipsum'];
        $this->assertNotNull($this->target->update(42, $attributes));
        $this->assertSame(42, $this->client->updateId);
        $this->assertSame($attributes, $this->client->updateAttributes);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class PostAsyncSpy extends PostAsyncDummy
{
    public $createAttributes;
    public $likeAttributes;
    public $singleId;
    public $unlikeId;
    public $unlikeAttributes;
    public $updateId;
    public $updateAttributes;

    public function create(array $attributes): PromiseInterface
    {
        $this->createAttributes = $attributes;

        return parent::create($attributes);
    }

    public function like(array $attributes): PromiseInterface
    {
        $this->likeAttributes = $attributes;

        return parent::like($attributes);
    }

    public function single(int $id): PromiseInterface
    {
        $this->singleId = $id;

        return parent::single($id);
    }

    public function unlike(int $id, array $attributes): PromiseInterface
    {
        $this->unlikeId = $id;
        $this->unlikeAttributes = $attributes;

        return parent::unlike($id, $attributes);
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        $this->updateId = $id;
        $this->updateAttributes = $attributes;

        return parent::update($id, $attributes);
    }
}
