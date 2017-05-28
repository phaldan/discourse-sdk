<?php

namespace PhALDan\Discourse\Client\Rest;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\Rest\Emails
 */
class EmailsTest extends HttpTestCase
{
    /**
     * @var Emails
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Emails(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list(Emails::ACTION_SENT)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::EMAIL_LIST, Emails::ACTION_SENT));
    }

    /**
     * @test
     */
    public function successListWithOffset(): void
    {
        $parameters = [Emails::OPTION_OFFSET => 1337];
        $this->assertNull($this->target->list(Emails::ACTION_SENT, $parameters)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::EMAIL_LIST, Emails::ACTION_SENT).'?'.Emails::OPTION_OFFSET.'=1337');
    }
}
