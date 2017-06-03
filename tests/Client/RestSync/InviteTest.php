<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\InviteAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\Invite
 */
class InviteTest extends TestCase
{
    /**
     * @var Invite
     */
    private $target;

    /**
     * @var InviteAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new InviteAsyncSpy();
        $this->target = new Invite($this->client);
    }

    /**
     * @test
     */
    public function successEmail(): void
    {
        $attributes = [InviteAsyncSpy::ATTR_EMAIL => 'email@example.com'];
        $this->assertNotNull($this->target->email($attributes));
        $this->assertSame($attributes, $this->client->emailAttributes);
    }

    /**
     * @test
     */
    public function successCreateLink(): void
    {
        $attributes = [InviteAsyncSpy::ATTR_EMAIL => 'email@example.com'];
        $this->assertNotNull($this->target->createLink($attributes));
        $this->assertSame($attributes, $this->client->createLinkAttributes);
    }

    /**
     * @test
     */
    public function successCreateToken(): void
    {
        $attributes = [InviteAsyncSpy::ATTR_EMAIL => 'email@example.com'];
        $this->assertNotNull($this->target->createToken($attributes));
        $this->assertSame($attributes, $this->client->createTokenAttributes);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class InviteAsyncSpy implements InviteAsync
{
    public $emailAttributes;
    public $createLinkAttributes;
    public $createTokenAttributes;

    public function email(array $attributes): PromiseInterface
    {
        $this->emailAttributes = $attributes;

        return $this->createPromise();
    }

    public function createLink(array $attributes): PromiseInterface
    {
        $this->createLinkAttributes = $attributes;

        return $this->createPromise();
    }

    public function createToken(array $attributes): PromiseInterface
    {
        $this->createTokenAttributes = $attributes;

        return $this->createPromise();
    }

    private function createPromise(): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
