<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\User
 */
class UserTest extends HttpTestCase
{
    /**
     * @var User
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new User(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successCreate(): void
    {
        $attributes = [User::ATTR_NAME => 'admin'];
        $this->assertNull($this->target->create($attributes)->wait());
        $this->assertHttpPost(RouteConstants::USER_CREATE, $attributes);
    }

    /**
     * @test
     */
    public function successDirectoryItems(): void
    {
        $parameters = [User::OPTION_PERIOD => User::PERIOD_WEEKLY];
        $this->assertNull($this->target->directoryItems($parameters)->wait());
        $this->assertHttpGet(RouteConstants::USER_DIRECTORY_ITEMS.'?'.User::OPTION_PERIOD.'='.User::PERIOD_WEEKLY);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $parameters = [User::OPTION_ORDER => User::ORDER_EMAIL];
        $this->assertNull($this->target->list(User::FLAG_ACTIVE, $parameters)->wait());
        $url = sprintf(RouteConstants::USER_LIST, User::FLAG_ACTIVE).'?'.User::OPTION_ORDER.'='.User::ORDER_EMAIL;
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
        $attributes = [User::ATTR_UPLOAD => 42];
        $this->assertNull($this->target->updateAvatar('admin', $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::USER_UPDATE_AVATAR, 'admin'), $attributes);
    }

    /**
     * @test
     */
    public function successUpdateEmail(): void
    {
        $attributes = [User::ATTR_EMAIL => 'admin@example.com'];
        $this->assertNull($this->target->updateEmail('admin', $attributes)->wait());
        $this->assertHttpPut(sprintf(RouteConstants::USER_UPDATE_EMAIL, 'admin'), $attributes);
    }
}
