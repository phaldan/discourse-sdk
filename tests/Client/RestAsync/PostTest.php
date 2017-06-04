<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Post
 */
class PostTest extends HttpTestCase
{
    /**
     * @var Post
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Post(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [Post::ATTR_RAW => 'Lorem Ipsum'];
        $this->assertNull($this->target->create($attributes)->wait());
        $this->assertHttpPost(RouteConstants::POST_CREATE, $attributes);
    }

    /**
     * @test
     */
    public function successLike(): void
    {
        $attributes = [Post::ATTR_ID => 1337];
        $this->assertNull($this->target->like($attributes)->wait());
        $this->assertHttpPost(RouteConstants::POST_LIKE, $attributes);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNull($this->target->single(1337)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::POST_SINGLE, 1337));
    }

    /**
     * @test
     */
    public function successUnlike(): void
    {
        $attributes = [Post::ATTR_POST_ACTION_TYPE => 42];
        $this->assertNull($this->target->unlike(1337, $attributes)->wait());
        $this->assertHttpDelete(sprintf(RouteConstants::POST_UNLIKE, 1337), $attributes);
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $attributes = [Post::ATTR_POST_RAW => 'Lorem Ipsum'];
        $this->assertNull($this->target->update(1337, $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::POST_UPDATE, 1337), $attributes);
    }
}
