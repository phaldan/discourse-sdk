<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Posts
 */
class PostsTest extends TestCase
{
    /**
     * @test
     */
    public function successCreate(): void
    {
        $client = new HttpPostSpy();
        $target = new Posts($client);
        $attributes = [Posts::ATTR_RAW => 'Lorem Ipsum'];
        $this->assertNull($target->create($attributes)->wait());
        $this->assertSame(RouteConstants::POST_CREATE, $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successLike(): void
    {
        $client = new HttpPostSpy();
        $target = new Posts($client);
        $attributes = [Posts::ATTR_ID => 1337];
        $this->assertNull($target->like($attributes)->wait());
        $this->assertSame(RouteConstants::POST_LIKE, $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $client = new HttpGetSpy();
        $target = new Posts($client);
        $this->assertNull($target->single(1337)->wait());
        $this->assertSame(sprintf(RouteConstants::POST_SINGLE, 1337), $client->path);
    }

    /**
     * @test
     */
    public function successUnlike(): void
    {
        $client = new HttpDeleteSpy();
        $target = new Posts($client);
        $attributes = [Posts::ATTR_POST_ACTION_TYPE => 42];
        $this->assertNull($target->unlike(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::POST_UNLIKE, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successUpdate(): void
    {
        $client = new HttpPutSpy();
        $target = new Posts($client);
        $attributes = [Posts::ATTR_POST_RAW => 'Lorem Ipsum'];
        $this->assertNull($target->update(1337, $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::POST_UPDATE, 1337), $client->path);
        $this->assertSame($attributes, $client->json);
    }
}
