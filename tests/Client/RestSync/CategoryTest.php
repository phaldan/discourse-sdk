<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\RestAsync\CategoryAsyncDummy;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Category
 */
class CategoryTest extends TestCase
{
    /**
     * @var CategoryAsyncSpy
     */
    private $client;

    /**
     * @var Category
     */
    private $target;

    protected function setUp(): void
    {
        $this->client = new CategoryAsyncSpy();
        $this->target = new Category($this->client);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $parameters = [CategoryAsyncSpy::OPTION_PARENT_CATEGORY => '1337'];
        $this->assertNotNull($this->target->list($parameters));
        $this->assertSame($parameters, $this->client->listParameters);
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
    public function successSingleBySlug(): void
    {
        $this->assertNotNull($this->target->singleBySlug('name'));
        $this->assertSame('name', $this->client->singleSlug);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [CategoryAsyncSpy::ATTR_NAME => 'name'];
        $this->assertNotNull($this->target->create($attributes));
        $this->assertSame($attributes, $this->client->createAttributes);
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $attributes = [CategoryAsyncSpy::ATTR_NAME => 'name'];
        $this->assertNotNull($this->target->update(42, $attributes));
        $this->assertSame(42, $this->client->updateId);
        $this->assertSame($attributes, $this->client->updateAttributes);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class CategoryAsyncSpy extends CategoryAsyncDummy
{
    public $listParameters;
    public $singleId;
    public $singleSlug;
    public $createAttributes;
    public $updateAttributes;
    public $updateId;

    public function list(array $parameters = []): PromiseInterface
    {
        $this->listParameters = $parameters;

        return parent::list($parameters);
    }

    public function single(int $id): PromiseInterface
    {
        $this->singleId = $id;

        return parent::single($id);
    }

    public function singleBySlug(string $slug): PromiseInterface
    {
        $this->singleSlug = $slug;

        return parent::singleBySlug($slug);
    }

    public function create(array $attributes): PromiseInterface
    {
        $this->createAttributes = $attributes;

        return parent::create($attributes);
    }

    public function update(int $id, array $attributes): PromiseInterface
    {
        $this->updateId = $id;
        $this->updateAttributes = $attributes;

        return parent::update($id, $attributes);
    }
}
