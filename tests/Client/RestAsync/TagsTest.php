<?php

namespace PhALDan\Discourse\Client\RestAsync;

/**
 * @author Philipp Daniels <philipp.daniels@gmail.com>
 * @covers \PhALDan\Discourse\Client\RestAsync\Tags
 */
class TagsTest extends HttpTestCase
{
    /**
     * @var Tags
     */
    private $target;

    protected function setUp(): void
    {
        parent::setUp();
        $this->target = new Tags(self::URL, $this->http);
    }

    /**
     * @test
     */
    public function successList(): void
    {
        $this->assertNull($this->target->list()->wait());
        $this->assertHttpGet(RouteConstants::TAG_LIST);
    }

    /**
     * @test
     */
    public function successSingle(): void
    {
        $this->assertNull($this->target->single('faq')->wait());
        $this->assertHttpGet(sprintf(RouteConstants::TAG_SINGLE, 'faq'));
    }
}