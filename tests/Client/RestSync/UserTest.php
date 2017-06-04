<?php

namespace PhALDan\Discourse\Client\RestSync;

use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use PhALDan\Discourse\Client\ResponseDummy;
use PhALDan\Discourse\Client\RestAsync\UserAsync;
use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestSync\User
 */
class UserTest extends TestCase
{
    /**
     * @var User
     */
    private $target;

    /**
     * @var UserAsyncSpy
     */
    private $client;

    protected function setUp(): void
    {
        $this->client = new UserAsyncSpy();
        $this->target = new User($this->client);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [UserAsyncSpy::ATTR_NAME => 'name'];
        $this->assertNotNull($this->target->create($attributes));
        $this->assertSame($attributes, $this->client->createAttributes);
    }

    /**
     * @test
     */
    public function successDirectoryItems(): void
    {
        $parameters = [UserAsyncSpy::OPTION_ORDER => UserAsyncSpy::ORDER_EMAIL];
        $this->assertNotNull($this->target->directoryItems($parameters));
        $this->assertSame($parameters, $this->client->directoryItemsParameters);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $parameters = [UserAsyncSpy::OPTION_ORDER => UserAsyncSpy::ORDER_EMAIL];
        $this->assertNotNull($this->target->list(UserAsyncSpy::FLAG_ACTIVE, $parameters));
        $this->assertSame(UserAsyncSpy::FLAG_ACTIVE, $this->client->listFlag);
        $this->assertSame($parameters, $this->client->listParameters);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNotNull($this->target->single('admin'));
        $this->assertSame('admin', $this->client->singleUsername);
    }

    /**
     * @test
     */
    public function successUpdateAvatar(): void
    {
        $attributes = [UserAsyncSpy::ATTR_UPLOAD => 1337];
        $this->assertNotNull($this->target->updateAvatar('admin', $attributes));
        $this->assertSame('admin', $this->client->updateAvatarUsername);
        $this->assertSame($attributes, $this->client->updateAvatarAttributes);
    }

    /**
     * @test
     */
    public function successUpdateEmail(): void
    {
        $attributes = [UserAsyncSpy::ATTR_EMAIL => 'test@example.com'];
        $this->assertNotNull($this->target->updateEmail('admin', $attributes));
        $this->assertSame('admin', $this->client->updateEmailUsername);
        $this->assertSame($attributes, $this->client->updateEmailAttributes);
    }
}

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 */
class UserAsyncSpy implements UserAsync
{
    public $createAttributes;
    public $directoryItemsParameters;
    public $listFlag;
    public $listParameters;
    public $singleUsername;
    public $updateAvatarUsername;
    public $updateAvatarAttributes;
    public $updateEmailUsername;
    public $updateEmailAttributes;

    public function create(array $attributes): PromiseInterface
    {
        $this->createAttributes = $attributes;

        return $this->createPromise();
    }

    public function directoryItems(array $parameters): PromiseInterface
    {
        $this->directoryItemsParameters = $parameters;

        return $this->createPromise();
    }

    public function list(string $flag, array $parameters): PromiseInterface
    {
        $this->listFlag = $flag;
        $this->listParameters = $parameters;

        return $this->createPromise();
    }

    public function single(string $username): PromiseInterface
    {
        $this->singleUsername = $username;

        return $this->createPromise();
    }

    public function updateAvatar(string $username, array $attributes): PromiseInterface
    {
        $this->updateAvatarUsername = $username;
        $this->updateAvatarAttributes = $attributes;

        return $this->createPromise();
    }

    public function updateEmail(string $username, array $attributes): PromiseInterface
    {
        $this->updateEmailUsername = $username;
        $this->updateEmailAttributes = $attributes;

        return $this->createPromise();
    }

    private function createPromise(): PromiseInterface
    {
        $promise = new Promise();
        $promise->resolve(new ResponseDummy());

        return $promise;
    }
}
