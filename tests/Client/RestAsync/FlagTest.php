<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Flag
 */
class FlagTest extends HttpTestCase
{
    /**
     * @var Flag
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Flag(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list(Flag::TYPE_ACTIVE)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::FLAG_LIST, Flag::TYPE_ACTIVE));
    }

    /**
     * @test
     */
    public function successListWithOffset()
    {
        $parameters = [Flag::OPTION_OFFSET => 1337];
        $this->assertNull($this->target->list(Flag::TYPE_ACTIVE, $parameters)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::FLAG_LIST, Flag::TYPE_ACTIVE).'?'.Flag::OPTION_OFFSET.'=1337');
    }
}
