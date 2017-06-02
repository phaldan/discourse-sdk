<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Users
 */
class UsersTest extends HttpTestCase
{
    /**
     * @var Users
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Users(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [Users::ATTR_NAME => 'admin'];
        $this->assertNull($this->target->create($attributes)->wait());
        $this->assertHttpPost(RouteConstants::USER_CREATE, $attributes);
    }

    /**
     * @test
     */
    public function successDirectoryItems(): void
    {
        $parameters = [Users::OPTION_PERIOD => Users::PERIOD_WEEKLY];
        $this->assertNull($this->target->directoryItems($parameters)->wait());
        $this->assertHttpGet(RouteConstants::USER_DIRECTORY_ITEMS.'?'.Users::OPTION_PERIOD.'='.Users::PERIOD_WEEKLY);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $parameters = [Users::OPTION_ORDER => Users::ORDER_EMAIL];
        $this->assertNull($this->target->list(Users::FLAG_ACTIVE, $parameters)->wait());
        $url = sprintf(RouteConstants::USER_LIST, Users::FLAG_ACTIVE).'?'.Users::OPTION_ORDER.'='.Users::ORDER_EMAIL;
        $this->assertHttpGet($url);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNull($this->target->single('admin')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::USER_SINGLE, 'admin'));
    }

    /**
     * @test
     */
    public function successUpdateAvatar(): void
    {
        $attributes = [Users::ATTR_UPLOAD => 42];
        $this->assertNull($this->target->updateAvatar('admin', $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::USER_UPDATE_AVATAR, 'admin'), $attributes);
    }

    /**
     * @test
     */
    public function successUpdateEmail(): void
    {
        $attributes = [Users::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->updateEmail('admin', $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::USER_UPDATE_EMAIL, 'admin'), $attributes);
    }
}
