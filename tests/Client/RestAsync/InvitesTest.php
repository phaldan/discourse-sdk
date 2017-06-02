<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Invites
 */
class InvitesTest extends HttpTestCase
{
    /**
     * @var Invites
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Invites(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successEmail(): void
    {
        $attributes = [Invites::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->email($attributes)->wait());
        $this->assertHttpPost(RouteConstants::INVITE_EMAIL, $attributes);
    }

    /**
     * @test
     */
    public function successCreateLink(): void
    {
        $attributes = [Invites::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->createLink($attributes)->wait());
        $this->assertHttpPost(RouteConstants::INVITE_CREATE_LINK, $attributes);
    }

    /**
     * @test
     */
    public function successCreateToken(): void
    {
        $attributes = [Invites::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->createToken($attributes)->wait());
        $this->assertHttpPost(RouteConstants::INVITE_CREATE_TOKEN, $attributes);
    }
}
