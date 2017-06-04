<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Email
 */
class EmailTest extends HttpTestCase
{
    /**
     * @var Email
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Email(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list(Email::ACTION_SENT)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::EMAIL_LIST, Email::ACTION_SENT));
    }

    /**
     * @test
     */
    public function successListWithOffset(): void
    {
        $parameters = [Email::OPTION_OFFSET => 1337];
        $this->assertNull($this->target->list(Email::ACTION_SENT, $parameters)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::EMAIL_LIST, Email::ACTION_SENT).'?'.Email::OPTION_OFFSET.'=1337');
    }
}
