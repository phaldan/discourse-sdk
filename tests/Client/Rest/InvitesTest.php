<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Invites
 */
class InvitesTest extends TestCase
{
    /**
     * @var Invites
     */
    private $target;

    /**
     * @var HttpPostSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new HttpPostSpy();
        $this->target = new Invites($this->client);
    }

    /**
     * @test
     */
    public function successEmail(): void
    {
        $attributes = [Invites::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->email($attributes)->wait());
        $this->assertSame(RouteConstants::INVITES_EMAIL, $this->client->path);
        $this->assertSame($attributes, $this->client->json);
    }

    /**
     * @test
     */
    public function successCreateLink(): void
    {
        $attributes = [Invites::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->createLink($attributes)->wait());
        $this->assertSame(RouteConstants::INVITES_CREATE_LINK, $this->client->path);
        $this->assertSame($attributes, $this->client->json);
    }

    /**
     * @test
     */
    public function successCreateToken(): void
    {
        $attributes = [Invites::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->createToken($attributes)->wait());
        $this->assertSame(RouteConstants::INVITES_CREATE_TOKEN, $this->client->path);
        $this->assertSame($attributes, $this->client->json);
    }
}
