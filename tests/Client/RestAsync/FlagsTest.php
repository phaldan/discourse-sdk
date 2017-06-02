<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Flags
 */
class FlagsTest extends HttpTestCase
{
    /**
     * @var Flags
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Flags(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list(Flags::TYPE_ACTIVE)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::FLAG_LIST, Flags::TYPE_ACTIVE));
    }

    /**
     * @test
     */
    public function successListWithOffset()
    {
        $parameters = [Flags::OPTION_OFFSET => 1337];
        $this->assertNull($this->target->list(Flags::TYPE_ACTIVE, $parameters)->wait());
        $this->assertHttpGet(sprintf(RouteConstants::FLAG_LIST, Flags::TYPE_ACTIVE).'?'.Flags::OPTION_OFFSET.'=1337');
    }
}
