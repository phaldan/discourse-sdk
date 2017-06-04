<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Invite
 */
class InviteTest extends HttpTestCase
{
    /**
     * @var Invite
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Invite(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successEmail(): void
    {
        $attributes = [Invite::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->email($attributes)->wait());
        $this->assertHttpPost(RouteConstants::INVITE_EMAIL, $attributes);
    }

    /**
     * @test
     */
    public function successCreateLink(): void
    {
        $attributes = [Invite::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->createLink($attributes)->wait());
        $this->assertHttpPost(RouteConstants::INVITE_CREATE_LINK, $attributes);
    }

    /**
     * @test
     */
    public function successCreateToken(): void
    {
        $attributes = [Invite::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->createToken($attributes)->wait());
        $this->assertHttpPost(RouteConstants::INVITE_CREATE_TOKEN, $attributes);
    }
}
