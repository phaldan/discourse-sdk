<?php

namespace PhALDan\Discourse\Client\Rest;

use PHPUnit\Framework\TestCase;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Users
 */
class UsersTest extends TestCase
{
    /**
     * @test
     */
    public function successCreate(): void
    {
        $client = new HttpPostSpy();
        $target = new Users($client);
        $attributes = [Users::ATTR_NAME => 'admin'];
        $this->assertNull($target->create($attributes)->wait());
        $this->assertSame(RouteConstants::USERS_CREATE, $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successDirectoryItems(): void
    {
        $client = new HttpGetSpy();
        $target = new Users($client);
        $this->assertNull($target->directoryItems([Users::OPTION_PERIOD => Users::PERIOD_WEEKLY])->wait());
        $url = RouteConstants::USERS_DIRECTORY_ITEMS.'?'.Users::OPTION_PERIOD.'='.Users::PERIOD_WEEKLY;
        $this->assertSame($url, $client->path);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $client = new HttpGetSpy();
        $target = new Users($client);
        $this->assertNull($target->list(Users::FLAG_ACTIVE, [Users::OPTION_ORDER => Users::ORDER_EMAIL])->wait());
        $url = sprintf(RouteConstants::USERS_LIST, Users::FLAG_ACTIVE).'?'.Users::OPTION_ORDER.'='.Users::ORDER_EMAIL;
        $this->assertSame($url, $client->path);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $client = new HttpGetSpy();
        $target = new Users($client);
        $this->assertNull($target->single('admin')->wait());
        $this->assertSame(sprintf(RouteConstants::USERS_SINGLE, 'admin'), $client->path);
    }

    /**
     * @test
     */
    public function successUpdateAvatar(): void
    {
        $client = new HttpPutSpy();
        $target = new Users($client);
        $attributes = [Users::ATTR_UPLOAD => 42];
        $this->assertNull($target->updateAvatar('admin', $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::USERS_UPDATE_AVATAR, 'admin'), $client->path);
        $this->assertSame($attributes, $client->json);
    }

    /**
     * @test
     */
    public function successUpdateEmail(): void
    {
        $client = new HttpPutSpy();
        $target = new Users($client);
        $attributes = [Users::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($target->updateEmail('admin', $attributes)->wait());
        $this->assertSame(sprintf(RouteConstants::USERS_UPDATE_EMAIL, 'admin'), $client->path);
        $this->assertSame($attributes, $client->json);
    }
}
